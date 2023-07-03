<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeesDetailTranslation;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'name',
        'last_name',
        'mother_last_name',
        'age',
        'birth_date',
        'sex',
        'base_salary',
    ];

    public function employee_detail_translation()
    {
        return $this->hasMany(EmployeesDetailTranslation::class);
    }

    public function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value != null ? Crypt::decryptString($value) : null,
            set: fn ($value) => Crypt::encryptString($value),
        );
    }

    public function lastName(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value != null ? Crypt::decryptString($value) : null,
            set: fn ($value) => Crypt::encryptString($value),
        );
    }

    public function motherLastName(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value != null ? Crypt::decryptString($value) : null,
            set: fn ($value) => Crypt::encryptString($value),
        );
    }
}
