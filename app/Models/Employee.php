<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeesDetailTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'age',
        'birth_date',
        'sex',
        'base_salary',
    ];

    public function employee_detail_translation()
    {
        return $this->hasMany(EmployeesDetailTranslation::class);
    }
}
