<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Event;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Str;

class EventsTable extends DataTableComponent
{
    protected $model = Event::class;

    public string $country;

// Optional, but if you need to initialize anything
    public function mount(string $country): void
    {
        $this->country = $country;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {

        if (empty($this->country)) {
            return Event::where('status', 'PENDING')
                ->select('*');
        } else {
            return Event::where('status', 'PENDING')
                ->where('country_iso', $this->country)
                ->select('*');
        }


    }

    public array $bulkActions = [
        'approveSelected' => 'Approve',
    ];

    public function approveSelected()
    {
        foreach ($this->getSelected() as $selectedId) {
            Event::firstWhere('id', $selectedId)->approve();
        }

        $this->clearSelected();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
//            Column::make("Status", "status")
//                ->sortable(),
//            Column::make("Title", "title")
//                ->sortable(),
//            Column::make("Country iso", "country_iso")
//                ->sortable(),
            Column::make('Description')
                ->format(
                    fn($value, $row, Column $column) => Str::of($row->description)->toHtmlString()
                ),
            LinkColumn::make('Title')
                ->title(fn($row) => $row->title)
                ->location(fn($row) => route('view_event', [$row, $row->slug])),
//            Column::make("Slug", "slug")
//                ->sortable(),

            Column::make("Organizer", "organizer")
                ->sortable(),

//            Column::make("Geoposition", "geoposition")
//                ->sortable(),
//            Column::make("Latitude", "latitude")
//                ->sortable(),
//            Column::make("Longitude", "longitude")
//                ->sortable(),
//            Column::make("Location", "location")
//                ->sortable(),

            Column::make("Start date", "start_date")
                ->sortable(),
            Column::make("End date", "end_date")
                ->sortable(),
            Column::make("Event url", "event_url")
                ->sortable(),
//            Column::make("Contact person", "contact_person")
//                ->sortable(),
//            Column::make("User email", "user_email")
//                ->sortable(),
//            Column::make("Picture", "picture")
//                ->sortable(),
//            Column::make("Pub date", "pub_date")
//                ->sortable(),
//            Column::make("Created", "created")
//                ->sortable(),
//            Column::make("Updated", "updated")
//                ->sortable(),
//            Column::make("Creator id", "creator_id")
//                ->sortable(),
//            Column::make("Report notifications count", "report_notifications_count")
//                ->sortable(),
//            Column::make("Reported at", "reported_at")
//                ->sortable(),
//            Column::make("Name for certificate", "name_for_certificate")
//                ->sortable(),
//            Column::make("Participants count", "participants_count")
//                ->sortable(),
//            Column::make("Average participant age", "average_participant_age")
//                ->sortable(),
//            Column::make("Percentage of females", "percentage_of_females")
//                ->sortable(),
//            Column::make("Codeweek for all participation code", "codeweek_for_all_participation_code")
//                ->sortable(),
//            Column::make("Name for certificate", "name_for_certificate")
//                ->sortable(),
//            Column::make("Organizer type", "organizer_type")
//                ->sortable(),
//            Column::make("Certificate url", "certificate_url")
//                ->sortable(),
//            Column::make("Certificate generated at", "certificate_generated_at")
//                ->sortable(),
//            Column::make("Approved by", "approved_by")
//                ->sortable(),
//            Column::make("Last report notification sent at", "last_report_notification_sent_at")
//                ->sortable(),
//            Column::make("Activity type", "activity_type")
//                ->sortable(),
//            Column::make("Picture detail", "picture_detail")
//                ->sortable(),
//            Column::make("Language", "language")
//                ->sortable(),
//            Column::make("Created at", "created_at")
//                ->sortable(),
//            Column::make("Updated at", "updated_at")
//                ->sortable(),
        ];
    }
}
