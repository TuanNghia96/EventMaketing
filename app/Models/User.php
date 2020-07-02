<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    const ADMIN = 1;
    const SUPPLIER = 2;
    const BUYER = 3;

    public $timestamps = true;
    protected $table = 'users';
    protected $perPage = 20;
    protected $fillable = [
        'email',
        'password',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = [
        'user'
    ];

    public static $role = [
        self::ADMIN => 'Quản trị viên',
        self::SUPPLIER => 'Nhà cung cấp',
        self::BUYER => 'Khách hàng',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (Gate::allows('edit-settings')) {
            static::addGlobalScope('withTrashed', function (Builder $builder) {
                $builder->withTrashed();
            });
        }
    }

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
     * relation to supplier table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne(\App\Models\Supplier::class, 'user_id', 'id');
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
        } elseif ($this->role == self::SUPPLIER) {
            return $this->supplier;
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
        } elseif ($this->role == self::SUPPLIER) {
            return $this->supplier->name;
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


    /**
     * disable status
     *
     * @return bool
     */
    public function disable()
    {
        if ($this->status) {
            $this->status = false;
            return $this->save();
        }
        return false;
    }

    /**
     * disable status
     *
     * @return bool
     */
    public function enable()
    {
        if (!$this->status) {
            $this->status = true;
            return $this->save();
        }
        return false;
    }
}
