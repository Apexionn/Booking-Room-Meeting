<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded=[
        'id'
    ];

    // public function bookings(){
    //     return $this->hasMany(Bookings::class);
    // }

    public function bookings(){
        return $this->belongsTo(Bookings::class,'user_id');
    }

    public function scopeFilters($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search ){
            return  $query->where('name','like', '%'.$search.'%')
                        ->orWhere('division','like', '%'.$search.'%')
                        ->orWhere('role','like', '%'.$search.'%')
                        ->orWhere('email','like', '%'.$search.'%');


        });


    }
}
