<?php

namespace App\Livewire;


use App\Exports\UsersExport;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class LeadingTeachersTable extends DataTableComponent
{


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setHideBulkActionsWhenEmptyEnabled();
;
    }


    public function filters(): array
    {
        return [
            SelectFilter::make('Approved')
                ->setFilterPillTitle('User Status')
                ->setFilterPillValues([
                    '1' => 'Approved',
                    '0' => 'Pending Approval',
                ])
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('approved', true);
                    } elseif ($value === '0') {
                        $builder->where('approved', false);
                    }
                }),

        ];
    }

    public function bulkActions(): array
    {
        return [
            'approve' => 'Approve',
            'disallow' => 'Disallow',
            'export' => 'Export'
        ];
    }

    public function approve()
    {
        User::whereIn('id', $this->getSelected())->update(['approved' => true]);

        $this->clearSelected();
    }

    public function disallow()
    {
        User::whereIn('id', $this->getSelected())->update(['approved' => false]);

        $this->clearSelected();
    }

    public function export()
    {
        $users = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new UsersExport($users), 'users.xlsx');
    }
    public function builder(): Builder
    {
        return User::role('leading teacher')->orderBy('approved');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('Firstname')
                ->sortable()
                ->searchable(),
            Column::make('Lastname')
                ->sortable()
                ->searchable(),
            Column::make('tag')
                ->sortable()
                ->searchable(),
            Column::make('Country','country_iso')
                ->sortable(),
            Column::make('email')
                ->sortable()
                ->searchable(),
            BooleanColumn::make('Approved')
        ];
    }
}
