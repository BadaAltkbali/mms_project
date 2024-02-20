<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'number',
        'rank',
        'name',
        'nationalNo',
        'bank',
        'bank_no',
        'wehda',
        'notes',
    ];

    public $timestamps = false;
}
