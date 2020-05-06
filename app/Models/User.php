<?php

namespace App\Models;

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
    const SELLER = 2;
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

    public static $role = [
        self::ADMIN => 'Quản trị viên',
        self::SELLER => 'Doanh nghiep',
        self::BUYER => 'Khach hang'
    ];

    public function admin()
    {
        return $this->hasMany('App\Models\Backend\Admin');
    }


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
}
