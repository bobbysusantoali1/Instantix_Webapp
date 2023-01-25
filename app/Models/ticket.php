<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class ticket extends Model
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;

    protected $table = 'tickets';

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

    public function event(){
        return $this->belongsTo(event::class);
    }

    public function myBook(){
        return $this->hasMany(myBook::class);
    }

    protected $fillable = [
        'event_id',
        'category_name',
        'category_stock',
        'category_curr_stock',
        'price',
    ];

}
