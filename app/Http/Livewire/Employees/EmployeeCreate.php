<?php

namespace App\Http\Livewire\Employees;

use DateTime;
use Livewire\Component;
use App\Models\Employee;
use App\Models\EmployeesDetailTranslation;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeCreate extends Component
{
    public $employee;

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

    public function mount($id = null)
    {
        $this->init($id);
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
        if ($this->employee) {
            $this->employee->update($data);
            unset($data['key']);
            unset($data['name']);
            unset($data['birth_date']);
            unset($data['sex']);
            unset($data['base_salary']);
            unset($data['age']);
            EmployeesDetailTranslation::updateOrInsert(
                ['employee_id' => $this->employee->id],
                ['about_me' => $data["about_me"], 'hobbies' => $data["hobbies"], 'language' => $data["language"]]
            );
        } else {
            $employee = Employee::create($data);
            $data["employee_id"] = $employee["id"];
            EmployeesDetailTranslation::create($data);
        }
    }

    private function init($id)
    {
        $employee = null;
        if ($id) {
            $employee = Employee::select(
                'employees.*',
                'employees_detail_translations.about_me',
                'employees_detail_translations.hobbies',
                'employees_detail_translations.language'
            )->leftJoin('employees_detail_translations', 'employees_detail_translations.employee_id', 'employees.id')
                ->where('employees.id', $id)->first();
        }
        $this->employee = $employee;

        if ($this->employee) {
            $this->key = $this->employee->key;
            $this->name = $this->employee->name;
            $this->age = $this->employee->age;
            $this->birth_date = $this->employee->birth_date;
            $this->sex = $this->employee->sex;
            $this->base_salary = $this->employee->base_salary;
            $this->about_me = $this->employee->about_me;
            $this->hobbies = $this->employee->hobbies;
            $this->language = $this->employee->language;
        }
    }
}
