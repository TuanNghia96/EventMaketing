<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    const ADMIN = 1;
    const SELLER = 2;
    const BUYER = 3;

    public $timestamps = true;
    protected $table = 'admins';
    protected $fillable = [
        'user_id',
        'admin_code',
        'name',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Pagination data of model
     *
     * @param array $input input data to search
     * @return Illuminate\Pagination\Paginator
     */
    public function getPaginate($input)
    {
        return self::with('user')->get();
    }
}
