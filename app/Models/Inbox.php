<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'Name',
        'EmailAddress',
        'PhoneNumber',
        'Message'
    ];
}
