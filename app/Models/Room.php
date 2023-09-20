<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    // public function bookings(){
    //     return $this->hasMany(Bookings::class);
    // }

    public function bookings(){
        return $this->belongsTo(Bookings::class,'room_id');
    }

    public function scopeFilters($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search ){
            return  $query->where('name','like', '%'.$search.'%');

        });


    }
}
