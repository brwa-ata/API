<?php

namespace App;


use App\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens , SoftDeletes;


    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = '1';
    const REGULAR_USER = '0';

    public $transformer = UserTransformer::class;
    protected $table = 'users';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /* MUTATOR FOR USER */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
    }
    /* ACCESSOR*/
    public function getNameAttribute($name)
    {
        return ucwords($name);  // hamw piteky saratay nawaka abe ba capital la aty wargrtnaway userakan
    }
    /* MUTATOR FOR EMAIL */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    public static  function  generateVerificationCode()
    {
        return str_random(40);
    }

}
