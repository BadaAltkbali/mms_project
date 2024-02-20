<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'BankName'
    ];

    public function Employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
