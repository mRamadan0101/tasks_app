<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $table = 'employees';
    protected $guarded = [];
    public const MANGER = 1;
    public const EMPLOYEE = 2;

    public function employees()
    {
        return $this->hasMany(self::class, 'manger_id', 'id')->where('type_id', self::EMPLOYEE);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'manger_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
