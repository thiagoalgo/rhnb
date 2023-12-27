<?php

namespace App\Livewire\Department;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\DepartmentForm;
use App\Models\Department;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use TallStackUi\Traits\Interactions;

final class DepartmentTable extends PowerGridComponent
{
    use WithExport;
    use Interactions;
    use AlertTrait;

    public DepartmentForm $form;

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
        return Department::query();
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
            Column::make(__('Name'), 'name')
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
        $this->redirectRoute('departments-edit', $rowId, navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId)
    {
        $this->dialog()->confirm(__('Confirm'), __('Do you really want to delete this :entity?', ['entity' => __('Department')]), [
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
        $this->form->setDepartment(Department::find($params['rowId']));
        $this->form->delete();
        $this->setFlash(self::SUCCESS, __(':entity deleted successfully.', ['entity' => __('Department')]));
        $this->redirectRoute('departments', navigate: true);
    }

    public function actions(Department $row): array
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
