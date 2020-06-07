<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Model implements Authenticatable
{
    use SoftDeletes;
    use AuthenticableTrait;

    const ADMIN = 1;
    const ENTERPRISE = 2;
    const BUYER = 3;

    public $timestamps = true;
    protected $table = 'users';
    protected $perPage = 20;
    protected $fillable = [
        'email',
        'user_name',
        'password',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static $role = [
        self::ADMIN => 'Quản trị viên',
        self::ENTERPRISE => 'Doanh nghiệp',
        self::BUYER => 'Khách hàng',
    ];

    /**
     * relation to admin table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin()
    {
        return $this->hasOne(\App\Models\Admin::class, 'user_id', 'id');
    }

    /**
     * relation to enterprise table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function enterprise()
    {
        return $this->hasOne(\App\Models\Enterprise::class, 'user_id', 'id');
    }
    /**
     * relation to buyer table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buyer()
    {
        return $this->hasOne(\App\Models\Buyer::class, 'user_id', 'id');
    }

    /**
     * get user information
     *
     * @return mixed
     */
    public function getUserAttribute()
    {
        if ($this->role == self::ADMIN) {
            return $this->admin;
        } elseif ($this->role == self::ENTERPRISE) {
            return $this->enterprise;
        } else {
            return $this->buyer;
        }
    }

    /**
     * get user name
     *
     * @return mixed
     */
    public function getNameAttribute()
    {
        if ($this->role == self::ADMIN) {
            return $this->admin->name;
        } elseif ($this->role == self::ENTERPRISE) {
            return $this->enterprise->name;
        } else {
            return $this->buyer->first_name . $this->buyer->last_name;
        }
    }

    /**
     * gen next code
     *
     * @param string $role
     * @param string $preCode
     * @return string
     */
    public static function getNextCode(string $role,string $preCode)
    {
        $codeArray = explode($role[1], $preCode);
        $number = $codeArray[1] + 1;
        return sprintf($role . "%05s", $number);
    }
}
