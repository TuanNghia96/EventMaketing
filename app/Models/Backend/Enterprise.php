<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'enterprises';
    protected $fillable = [
        'user_id',
        'enterprise_code',
        'name',
        'address',
        'phone',
        'bank_account',
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
