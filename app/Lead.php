<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['first_sms', 'second_sms', 'third_sms', 'full_name', 'email', 'phone', 'organisation'];
}
