<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdjectiveEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'AdjName'
    ];

    public function Employee()
{
    return $this->belongsTo('App\Models\Employee');
}
}
