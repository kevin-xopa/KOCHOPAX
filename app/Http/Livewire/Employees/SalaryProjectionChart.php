<?php

namespace App\Http\Livewire\Employees;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Charts\SampleChart;

class SalaryProjectionChart extends Component
{
    public $employee;

    public function render()
    {
        $chart = new SampleChart;

        $startDate = Carbon::parse($this->employee->created_at);

        $data = [];
        $salary = $this->employee->base_salary;
        for ($i = 0; $i < 6; $i++) {
            $labels[] = $startDate->addMonths(4)->format('d/m/Y');

            $data[] = $salary;
            $salary = $salary * 1.04; // increment 4%
        }

        $chart->labels($labels);
        $chart->dataset('Salary Projection', 'line', $data);




        return view('livewire.employees.salary-projection-chart', compact('chart'));
    }

    // public function mount($id = null)
    // {
    //     $employee = null;
    //     if ($id) {
    //         $employee = Employee::select(
    //             'employees.base_salary'
    //         )->where('employees.id', $id)->first();
    //         dd($id);
    //     }
    //     $this->employee = $employee;
    // }
}
