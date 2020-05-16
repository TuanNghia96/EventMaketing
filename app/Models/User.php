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
     * Scope a query by name
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    /**
     * Scope a query by email
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $mailAddress
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEmail($query, $mailAddress)
    {
        return $query->where('email', 'like', '%' . $mailAddress . '%');
    }

    /**
     * Scope a query by address
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $address
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAdress($query, $address)
    {
        return $query->where('address', 'like', '%' . $address . '%');
    }

    /**
     * Scope a query by phone
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $phone
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }


    /**
     * Pagination data of model
     *
     * @param array $input input data to search
     * @return Illuminate\Pagination\Paginator
     */
    public function getPaginate($input)
    {
        $query = $this->with('classroom');

        //check input to scope
        if (isset($input['email'])) {
            $query->ofEmail($input['email']);;
        }
        if (isset($input['name'])) {
            $query->ofName($input['name']);
        }
        if (isset($input['address'])) {
            $query->ofAdress($input['address']);;
        }
        if (isset($input['phone'])) {
            $query->ofPhone($input['phone']);;
        }
        if (isset($input['classroom_id'])) {
            $query->ofClassroom($input['classroom_id']);;
        }
        return $query->paginate();
    }

    /**
     * Create new user with input data
     *
     * @param array $input
     * @return App\Models\User|null
     */
    public function addUser(array $input)
    {
        $input['password'] = Hash::make($input['password']);
        return $this->create($input);
    }

    /**
     * find user have id and return
     *
     * @param int $id id of user
     * @return  App\Models\User|null
     */
    public function findUser($id)
    {
        return $this->find($id);
    }

    /**
     * update user infomation
     *
     * @param array $input data update
     * @return bool
     */
    public function updateUser($input)
    {
        // check input have password
        if (isset($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        return $this->find($input['id'])->update($input);
    }

    /**
     * delete user have id
     *
     * @param int $id
     * @return bool
     */
    public function deleteUser($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * relation to users table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users()
    {
        if ($this->role == self::ADMIN) {
            $relaytion = $this->hasOne(\App\Models\Admin::class, 'user_id', 'id');
        } elseif ($this->role == self::ENTERPRISE) {
            $relaytion = $this->hasOne(\App\Models\Enterprise::class);
        } else {
            $relaytion = $this->hasOne(\App\Models\Buyer::class);
        }
        return $relaytion;
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
