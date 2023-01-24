<?php

namespace App\Models;

use App\Models\event;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class user extends Model implements Authenticatable
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;

    protected $table = 'users';

    // for UUID
    public $increment = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function($models){
            if($models->getKey() == null){
                $models->setAttribute($models->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    public function myBook(){
        return $this->hasMany(myBook::class);
    }

    public function event(){
        return $this->hasMany(event::class);
    }

    protected $fillable = [
        'role',
        'full_name',
        'email',
        'password',
        'dob',
        'gender',
        'address',
        'phone_number'
    ];

    protected $hidden = [
        'password'
    ];
}
