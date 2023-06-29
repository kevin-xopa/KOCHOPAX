<?php

namespace App\Http\Livewire\Employees;

use DateTime;
use Livewire\Component;
use App\Models\Employee;
use App\Models\EmployeesDetailTranslation;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeCreate extends Component
{

    public $key;
    public $name;
    public $age;
    public $birth_date;
    public $sex;
    public $base_salary;
    public $about_me;
    public $hobbies;
    public $language;

    protected $rules = [
        'key' => 'required|string|unique:employees',
        'name' => 'required',
        'birth_date' => 'required',
        'sex' => 'required',
        'base_salary' => 'required',
        'about_me' => 'nullable',
        'hobbies' => 'nullable',
        'language' => 'nullable',
    ];

    public function mount(Employee $employee){

    }

    public function render()
    {
        return view('livewire.employees.employee-create');
    }

    public function create()
    {
        $fechaActual = new DateTime();
        $fechaNacimiento = new DateTime($this->birth_date);
        $diferencia = $fechaActual->diff($fechaNacimiento);
        $age = $diferencia->y;

        $data = $this->validate();
        $data['age'] = $age;

        $employee = Employee::create($data);
        $data["employee_id"] = $employee["id"];
        EmployeesDetailTranslation::create($data);
    }
}
