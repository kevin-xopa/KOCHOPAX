<?php

namespace App\Http\Livewire\Public\Employees;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class PublicEmployees extends Component
{
    use WithPagination;

    public $showMenu  = false;

    public $name = null;

    public function mount()
    {
        $this->name = '';
        // Configura la variable $showMenu según tus necesidades
        $this->showMenu = false;
    }


    public function render()
    {
        $employees = Employee::orderBy('name', 'ASC');
        if ($this->name) {
            $employees = $employees->where('name', 'like', '%' . $this->name . '%');
        }

        $employees = $employees->paginate(5);
        return view('livewire.public.employees.public-employees', ['employees' => $employees]);
    }
}
