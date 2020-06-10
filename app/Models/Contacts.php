<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'company_name',
        'subject',
        'message',
    ];
}
