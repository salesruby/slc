<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['full_name', 'email', 'phone', 'organisation'];
}
