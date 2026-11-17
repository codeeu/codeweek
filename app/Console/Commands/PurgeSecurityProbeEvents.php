<?php

namespace App\Console\Commands;

use App\Event;
use App\Rules\NotReservedEmailDomain;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

/**
 * Soft-delete leftover security/probe test activities and their probe users.
 *
 * Matches reserved test email TLDs (.invalid, .test, .example, .localhost)
 * and known CW probe title/description markers from authorized testing.
 *
 * Usage:
 *  php artisan events:purge-security-probes
 *  php artisan events:purge-security-probes --delete
 *  php artisan events:purge-security-probes --delete --users
 */
class PurgeSecurityProbeEvents extends Command
{
    protected $signature = 'events:purge-security-probes
        {--delete : Soft-delete matched events (default: dry-run)}
        {--users : Also soft-delete users whose email uses a reserved test domain}';

    protected $description = 'Soft-delete security/probe test activities (and optionally probe users) that use reserved .invalid/.test email domains.';

    public function handle(): int
    {
        $shouldDelete = (bool) $this->option('delete');
        $purgeUsers = (bool) $this->option('users');

        $this->info(sprintf(
            'Scanning for security probe events… (mode: %s)',
            $shouldDelete ? 'DELETE' : 'DRY-RUN'
        ));

        $eventsQuery = $this->probeEventsQuery();
        $count = (clone $eventsQuery)->count();

        $this->info("Matched events: {$count}");

        if ($count > 0) {
            (clone $eventsQuery)
                ->orderBy('id')
                ->limit(50)
                ->get(['id', 'title', 'user_email', 'country_iso', 'status'])
                ->each(function (Event $event): void {
                    $this->line(sprintf(
                        '  #%d [%s] %s <%s> (%s)',
                        $event->id,
                        $event->status,
                        $event->title,
                        $event->user_email,
                        $event->country_iso
                    ));
                });

            if ($count > 50) {
                $this->line('  … and '.($count - 50).' more');
            }
        }

        if ($shouldDelete && $count > 0) {
            // Soft-delete without firing organizer notification emails.
            $deleted = $eventsQuery->delete();
            $this->info("Soft-deleted events: {$deleted}");
        } elseif (! $shouldDelete) {
            $this->comment('Dry-run only. Re-run with --delete to soft-delete.');
        }

        if ($purgeUsers) {
            $usersQuery = User::query()->where(function (Builder $query): void {
                foreach (NotReservedEmailDomain::RESERVED_TLDS as $tld) {
                    $query->orWhere('email', 'like', '%.'.$tld);
                }
            });

            $userCount = (clone $usersQuery)->count();
            $this->info("Matched probe users: {$userCount}");

            if ($shouldDelete && $userCount > 0) {
                $deletedUsers = $usersQuery->delete();
                $this->info("Soft-deleted users: {$deletedUsers}");
            } elseif (! $shouldDelete) {
                $this->comment('Dry-run only for users. Re-run with --delete --users to soft-delete.');
            }
        }

        return self::SUCCESS;
    }

    private function probeEventsQuery(): Builder
    {
        return Event::query()->where(function (Builder $query): void {
            foreach (NotReservedEmailDomain::RESERVED_TLDS as $tld) {
                $query->orWhere('user_email', 'like', '%.'.$tld);
            }

            $query->orWhere('title', 'like', 'CW Probe%')
                ->orWhere('title', 'like', 'CW pending probe%')
                ->orWhere('title', 'like', 'CW marker test%')
                ->orWhere('title', 'like', 'CW Probe Create%')
                ->orWhere('description', 'like', '%authorized security testing%')
                ->orWhere('description', 'like', '%cwmark benign%')
                ->orWhere('description', 'like', '%Benign baseline description for tester probe%');
        });
    }
}
