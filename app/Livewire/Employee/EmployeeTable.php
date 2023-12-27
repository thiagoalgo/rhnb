<?php

namespace App\Livewire\Employee;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\EmployeeForm;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use TallStackUi\Traits\Interactions;

final class EmployeeTable extends PowerGridComponent
{
    use WithExport;
    use Interactions;
    use AlertTrait;

    public EmployeeForm $form;

    public function setUp(): array
    {
        //$this->showCheckBox();

        return [
            Header::make()
                ->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Employee::query()
            ->join('users as u', function ($users) {
                $users->on('employees.id', '=', 'u.id');
            })
            ->select('employees.*', 'u.name as user_name', 'u.email as user_email');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make(__('Registration'), 'registration')
                ->searchable()
                ->sortable(),
            Column::make(__('Name'), 'user_name', 'user.name')
                ->searchable()
                ->sortable(),
            Column::make(__('Email'), 'user_email', 'user.email')
                ->searchable()
                ->sortable(),
            Column::action(__('Actions'))
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->redirectRoute('employees-edit', $rowId, navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId)
    {
        $this->dialog()->confirm(__('Confirm'), __('Do you really want to delete this :entity?', ['entity' => __('Employee')]), [
            'confirm' => [
                'text' => 'Sim',
                'method' => 'deleteConfirmed',
                'params' => ['rowId' => $rowId]
            ],
            'cancel' => [
                'text' => 'Não'
            ]
        ]);
    }

    public function deleteConfirmed($params): void
    {
        $this->form->setEmployee(Employee::find($params['rowId']));
        $this->form->delete();
        $this->setFlash(self::SUCCESS, __(':entity deleted successfully.', ['entity' => __('Employee')]));
        $this->redirectRoute('employees', navigate: true);
    }

    public function actions(Employee $row): array
    {
        return [
            Button::add('edit')
                ->bladeComponent('button.circle', [
                    'primary' => true,
                    'icon' => 'pencil',
                    'sm' => true
                ])
                ->id()
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('delete')
                ->bladeComponent('button.circle', [
                    'color' => 'red',
                    'icon' => 'trash',
                    'sm' => true
                ])
                ->id()
                ->dispatch('delete', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
