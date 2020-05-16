<?php

namespace App\Models;

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
        'city',
        'avatar',
        'phone',
        'bank_account',
    ];

    const CITY = [
        1 => 'Hà Nội',
        2 => 'Đà nẵng',
        3 => 'Tp. Hồ Chí Minh',
        4 => 'Tp khác',
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

    /**
     * gen next code
     *
     * @param string $preCode
     * @return string
     */
    public static function getNextCode(string $preCode)
    {
        $codeArray = explode('P', $preCode);
        $number = $codeArray[1] + 1;
        return sprintf("EP%05s", $number);
    }

    /**
     * relationship to event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'enterprise_events');
    }
}
