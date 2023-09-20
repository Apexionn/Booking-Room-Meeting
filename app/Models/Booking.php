<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    // public function rooms(){
    //     return $this->belongsTo(Room::class);
    // }

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }

    public function rooms(){
        return $this->hasMany(Room::class,'id','room_id');
    }

    public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }

    public function scopeFilters($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search ){

            return  $query->whereHas('rooms', function ($query) use ($search){
                            $query->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('users', function ($query) use ($search){
                            $query->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('users', function ($query) use ($search){
                            $query->where('division', 'like', '%' . $search . '%');
                        })
                        ->orWhere('booking_date','like', '%'.$search.'%')
                        ->orWhere('time_start','like', '%'.$search.'%')
                        ->orWhere('description','like', '%'.$search.'%');
        });
    }
}
