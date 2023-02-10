<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $guarded = [];
    public const STATUS = [
        0 => 'Pending',
        1 => 'Process',
        2 => 'Done',
    ];

    public function manger()
    {
        return $this->belongsTo(Employee::class, 'manger_id', 'id')->withDefault();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id')->withDefault();
    }
}
