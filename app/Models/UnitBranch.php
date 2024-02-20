<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitBranch extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'unitBranch_Name'
    ];

    public function Employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
