<?php

// Model Measurement
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $fillable = ['age', 'gender', 'sistolik', 'diastolik', 'bpm', 'user_id'];
}