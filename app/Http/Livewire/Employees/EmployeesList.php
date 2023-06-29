<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use PDO;
use PhpOption\None;

class EmployeesList extends Component
{
    use WithPagination;

    public $name = null;

    public function mount()
    {
        $this->name = '';
    }


    public function render()
    {
        $employees = Employee::orderBy('name', 'ASC');
        if ($this->name) {
            $employees = $employees->where('name', 'like', '%' . $this->name . '%');
        }

        $employees = $employees->paginate(5);
        return view('livewire.employees.employees-list', ['employees' => $employees]);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
