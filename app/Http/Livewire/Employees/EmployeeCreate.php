<?php

namespace App\Http\Livewire\Employees;

use DateTime;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\EmployeesDetailTranslation;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeCreate extends Component
{
    public $mensaje;

    public $employee;

    public $old_key;
    public $key;
    public $name;
    public $last_name;
    public $mother_last_name;
    public $age;
    public $birth_date;
    public $sex;
    public $base_salary;
    public $about_me;
    public $hobbies;
    public $language;

    protected function prepareForValidation($attributes): array
    {
        $fechaActual = new DateTime();
        $fechaNacimiento = new DateTime($this->birth_date);
        $diferencia = $fechaActual->diff($fechaNacimiento);
        $age = $diferencia->y;

        $attributes['age'] = $age;
        // $this->old_key = $attributes['key'];
        $attributes['key'] = date('Ymd') . substr($attributes['name'], 0, 1) . substr($attributes['last_name'], 0, 1) . substr($attributes['mother_last_name'], 0, 1);
        // prefiero la siguiente opción, donde la key se genera por strtotime, existe la posibilidad de ingreso de nuevos empleados, con las mismas iniciales, y en niv de base de datos, es mejor que la key sea unica
        // $data['key'] = Str::slug(strtotime(date("Ymd")) . ' ' . substr($this->name, 0, 1) . substr($this->last_name, 0, 1) . substr($this->mother_last_name, 0, 1), '-');

        return $attributes;
    }

    public function rules()
    {
        return [
            'key' => [
                'required',
                'string',
                Rule::unique('employees')->ignore($this->old_key, 'key'),
            ],
            'name' => 'required',
            'last_name' => 'required',
            'mother_last_name' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'age' => 'required',
            'base_salary' => 'required',
            'about_me' => 'nullable',
            'hobbies' => 'nullable',
            'language' => 'nullable',
        ];
    }

    public function mount($id = null)
    {
        $this->init($id);
    }

    public function render()
    {
        return view('livewire.employees.employee-create');
    }

    public function saved()
    {
        $this->mensaje = null;
        $data = $this->validate();
        if ($this->employee) {
            $this->old_key = $data["key"];

            $this->employee->update($data);

            EmployeesDetailTranslation::updateOrInsert(
                ['employee_id' => $this->employee->id],
                ['about_me' => $data["about_me"], 'hobbies' => $data["hobbies"], 'language' => $data["language"]]
            );

            $this->mensaje = 'Record updated successfully!';
        } else {
            $this->clean();
            $employee = Employee::create($data);
            $data["employee_id"] = $employee["id"];
            EmployeesDetailTranslation::create($data);
            $this->mensaje = 'Record created successfully!';
        }
    }

    private function init($id)
    {
        // $this->old_key = null;
        $employee = null;
        if ($id) {
            $employee = Employee::select(
                'employees.*',
                'employees_detail_translations.about_me',
                'employees_detail_translations.hobbies',
                'employees_detail_translations.language'
            )->leftJoin('employees_detail_translations', 'employees_detail_translations.employee_id', 'employees.id')
                ->where('employees.id', $id)->withTrashed()->first();
        }
        $this->employee = $employee;

        if ($this->employee) {
            $this->old_key = $this->employee->key;
            $this->key = $this->employee->key;
            $this->name = $this->employee->name;
            $this->last_name = $this->employee->last_name;
            $this->mother_last_name = $this->employee->mother_last_name;
            $this->age = $this->employee->age;
            $this->birth_date = $this->employee->birth_date;
            $this->sex = $this->employee->sex;
            $this->base_salary = $this->employee->base_salary;
            $this->about_me = $this->employee->about_me;
            $this->hobbies = $this->employee->hobbies;
            $this->language = $this->employee->language;
        }
    }

    public function clean()
    {
        $this->key = '';
        $this->name = '';
        $this->last_name = '';
        $this->mother_last_name = '';
        $this->age = '';
        $this->birth_date = '';
        $this->sex = '';
        $this->base_salary = '';
        $this->about_me = '';
        $this->hobbies = '';
        $this->language = '';
    }
}
