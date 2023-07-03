<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeesRestore extends Component
{
    use WithPagination;

    public $name = null;

    public function mount()
    {
        $this->name = '';
    }

    public function render()
    {
        $employees = Employee::onlyTrashed()->orderBy('name', 'ASC');
        if ($this->name) {
            $employees = $employees->where('name', 'like', '%' . $this->name . '%');
        }

        $employees = $employees->paginate(5);
        return view('livewire.employees.employees-restore', ['employees' => $employees]);
    }


    public function activate($employee)
    {
        // dd($employee);
        Employee::onlyTrashed()->where('key', $employee['key'])->restore();
    }

    public function permanent_delete($employee)
    {
        Employee::onlyTrashed()->where('key', $employee['key'])->forceDelete();
    }
}
