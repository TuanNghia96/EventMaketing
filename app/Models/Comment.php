<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
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
