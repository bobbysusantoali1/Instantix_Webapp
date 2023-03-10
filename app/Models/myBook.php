<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class myBook extends Model
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;

    protected $table = 'myBooks';

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

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function ticket(){
        return $this->hasMany(ticket::class);
    }

    protected $guarded = [];

}
