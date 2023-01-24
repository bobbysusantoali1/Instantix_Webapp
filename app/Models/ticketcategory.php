<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticketcategory extends Model
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

    protected $fillable = [
        'event_id',
        'category_name',
        'category_stock',
        'category_curr_stock',
        'price',
    ];

}
