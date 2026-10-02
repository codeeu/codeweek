<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ImportBulgarianLeadingTeachers extends Command
{
    protected $signature = 'leading-teachers:import-bulgaria
                            {--dry-run : Preview changes without writing to the database}';

    protected $description = 'Create or update Bulgarian Leading Teachers with website codes for the activity registration dropdown';

    /**
     * Spreadsheet: C4EU_20240801_EUCodeWeek Leading Teachers Bulgaria.xlsx
     * Columns: Full name, Email address, Website Code (D).
     *
     * @var list<array{firstname: string, lastname: string, email: string, tag: string}>
     */
    private array $teachers = [
        ['firstname' => 'Desislava', 'lastname' => 'Dimitrova', 'email' => 'd_dimitrova@sukim.eu', 'tag' => 'BG-Ddimitrova-001'],
        ['firstname' => 'Desislava', 'lastname' => 'Tsokova', 'email' => 'tsokovadesi@gmail.com', 'tag' => 'BG-Dtsokova-002'],
        ['firstname' => 'Deyana', 'lastname' => 'Peykova', 'email' => 'deyana@mail.bg', 'tag' => 'BG-Dpeykova-003'],
        ['firstname' => 'Eleonora', 'lastname' => 'Pavlova', 'email' => 'eleonora.pavlova@mgberon.com', 'tag' => 'BG-Epavlova-004'],
        ['firstname' => 'Elka', 'lastname' => 'Ivanova', 'email' => 'elka_ivanova@abv.bg', 'tag' => 'BG-Eivanova-005'],
        ['firstname' => 'Elza', 'lastname' => 'Licheva', 'email' => 'elicheva@abv.bg', 'tag' => 'BG-Elicheva-006'],
        ['firstname' => 'Ivelina', 'lastname' => 'Temelkova', 'email' => 'itemelkova@119su.bg', 'tag' => 'BG-Itemelkova-007'],
        ['firstname' => 'Lyudmil', 'lastname' => 'Bonev', 'email' => 'lkbonev72@gmail.com', 'tag' => 'BG-Lbonev-008'],
        ['firstname' => 'Maria', 'lastname' => 'Chakurova', 'email' => 'mimmich11@abv.bg', 'tag' => 'BG-Mchakurova-009'],
        ['firstname' => 'Maria', 'lastname' => 'Kirilova', 'email' => 'eg.m.kirilova@gmail.com', 'tag' => 'BG-Mkirilova-010'],
        ['firstname' => 'Mariana', 'lastname' => 'Markova-Petkova', 'email' => 'mariyana.markova@zaimov-pl.com', 'tag' => 'BG-MMarkovaPetrova-011'],
        ['firstname' => 'Marin', 'lastname' => 'Ivanov Popov', 'email' => 'm.i.popov@gmail.com', 'tag' => 'BG-Mpopov-012'],
        ['firstname' => 'Natalia', 'lastname' => 'Stankova', 'email' => 'nstankova579@gmail.com', 'tag' => 'BG-Nstankova-013'],
        ['firstname' => 'Nedyalka', 'lastname' => 'Yordanova', 'email' => 'n.yordanova@pgmett.com', 'tag' => 'BG-Nyordanova-014'],
        ['firstname' => 'Neli', 'lastname' => 'Filipova', 'email' => 'neli.philipova@2su.bg', 'tag' => 'BG-Nphilipova-015'],
        ['firstname' => 'Neli', 'lastname' => 'Tikhomirova', 'email' => 'tihomirova@mg-babatonka.bg', 'tag' => 'BG-Ntihomirova-016'],
        ['firstname' => 'Rositsa', 'lastname' => 'Boneva', 'email' => 'boneva.r@nfsg-sofia.org', 'tag' => 'BG-Rboneva-017'],
        ['firstname' => 'Rositsa', 'lastname' => 'Yurukova', 'email' => 'rositsa.yurukova@bps-edu.org', 'tag' => 'BG-Ryurukova-018'],
        ['firstname' => 'Sevdie', 'lastname' => 'Aliyeva', 'email' => 'sevdi_75@abv.bg', 'tag' => 'BG-Saliyeva-019'],
        ['firstname' => 'Valya', 'lastname' => 'Garbacheva', 'email' => 'valya.garbacheva@edu.mon.bg', 'tag' => 'BG-VGArbacheva-020'],
        ['firstname' => 'Vanya', 'lastname' => 'Krasteva Stefanova', 'email' => 'stefanovavania@abv.bg', 'tag' => 'BG-Vstefanova-021'],
        ['firstname' => 'Yordanka', 'lastname' => 'Mladenova', 'email' => 'iordi65@abv.bg', 'tag' => 'BG-Ymladenova-022'],
        ['firstname' => 'Ирина', 'lastname' => 'Христова Стойкова', 'email' => 'istojkova@gmail.com', 'tag' => 'BG-Istojkova-023'],
        ['firstname' => 'Kichka', 'lastname' => 'Petrova', 'email' => 'kiki_petrova@abv.bg', 'tag' => 'BG-Kpetrova-024'],
        ['firstname' => 'Petya', 'lastname' => 'Kostova-Zheleva', 'email' => 'pepi_geleva@abv.bg', 'tag' => 'BG-Pgeleva-025'],
        ['firstname' => 'Ivelina', 'lastname' => 'Markova-Kenarova', 'email' => 'iva80_stm@abv.bg', 'tag' => 'BG-IMarkovaKenarova-026'],
    ];

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $role = Role::where('name', 'leading teacher')->first();
        if (! $role) {
            $this->error("Role 'leading teacher' does not exist.");

            return self::FAILURE;
        }

        $created = 0;
        $updated = 0;
        $roleAssigned = 0;

        foreach ($this->teachers as $teacher) {
            $email = strtolower(trim($teacher['email']));
            $existing = User::withTrashed()->where('email', $email)->first();

            if ($dryRun) {
                $action = $existing ? 'update' : 'create';
                $this->line("[{$action}] {$email} → {$teacher['tag']}");
                $existing ? $updated++ : $created++;

                if (! $existing || ! $existing->hasRole('leading teacher')) {
                    $roleAssigned++;
                }

                continue;
            }

            if ($existing) {
                if ($existing->trashed()) {
                    $existing->restore();
                }

                $existing->firstname = $teacher['firstname'];
                $existing->lastname = $teacher['lastname'];
                $existing->country_iso = 'BG';
                $existing->tag = $teacher['tag'];
                $existing->save();
                $user = $existing;
                $updated++;
            } else {
                $user = new User();
                $user->firstname = $teacher['firstname'];
                $user->lastname = $teacher['lastname'];
                $user->username = Str::slug($teacher['firstname'].'-'.$teacher['lastname']).'-'.Str::random(4);
                $user->email = $email;
                $user->password = Hash::make(Str::random(40));
                $user->country_iso = 'BG';
                $user->tag = $teacher['tag'];
                $user->privacy = true;
                $user->receive_emails = true;
                $user->consent_given_at = now();
                $user->email_verified_at = now();
                $user->avatar_path = 'avatars/default.png';
                $user->magic_key = random_int(100000, 999999);
                $user->save();
                $created++;
            }

            if (! $user->hasRole('leading teacher')) {
                $user->assignRole($role);
                $roleAssigned++;
            }

            $this->info("OK {$email} → {$teacher['tag']}");
        }

        $prefix = $dryRun ? 'Dry-run' : 'Done';
        $this->info("{$prefix}: created={$created}, updated={$updated}, role_assigned={$roleAssigned}");

        return self::SUCCESS;
    }
}
