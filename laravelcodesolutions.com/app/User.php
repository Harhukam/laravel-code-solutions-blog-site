<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'role' , 'active','mobile_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    const ADMIN_TYPE ='A';
    const SELLER_TYPE ='S';
    const USER_TYPE ='U';

    public function isAdmin()    {
        return $this->role == self::ADMIN_TYPE;
    }

    public function isSeller()    {
        return $this->role == self::SELLER_TYPE;
    }

    public function isUser()    {
        return $this->role == self::USER_TYPE;
    }


    /**
     * @param $inputs
     * @param null $id
     * @return mixed
     */
    public function store($inputs, $id = null)
    {
        if($id)
        {
            $users = $this->findOrFail($id);
            return $users->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }

    }
}
