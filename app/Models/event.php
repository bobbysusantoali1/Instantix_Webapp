<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class event extends Model
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;

    protected $table = 'events';

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

    public function scopeSearching($query, array $search, array $location){
        $query->when($search['search'] ?? false, function($query, $search){
                    return $query->where('event_name', 'like', '%' . $search . '%');
                })->when($location['selected'] ?? false, function($query, $location){
                    return $query->where('event_location', $location);
                });
    }

    protected $fillable = [
        'user_id',
        'event_name',
        'event_desc',
        'event_location',
        'event_artist',
        'event_image',
        'event_date',
        'event_start_time',
        'event_end_time'
    ];

}
