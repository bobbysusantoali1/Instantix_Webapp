<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myBook extends Model
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
        'customer_name',
        'customer_age',
        'customer_id_card',
        'event_name',
        'event_address',
        'event_artist',
        'event_image',
        'ticket_category',
        'price',
        'quantity',
        'event_date',
        'event_end_time',
        'event_booking_time',
        'event_booking_code'
    ];

}
