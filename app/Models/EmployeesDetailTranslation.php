<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeesDetailTranslation extends Model
{
    use HasFactory;

    protected $table = 'employees_detail_translations';

    protected $fillable = [
        'about_me',
        'hobbies',
        'language',
        'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
