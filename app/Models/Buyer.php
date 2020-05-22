<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'buyers';
    protected $fillable = [
        'user_id',
        'buyer_code',
        'first_name',
        'last_name',
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

    public function events()
    {
        return $this->belongsToMany(Event::class, 'tickets')->withPivot('qrcode_check');
    }
}
