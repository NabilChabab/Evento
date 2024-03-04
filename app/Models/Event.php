<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;




    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'total_seats',
        'reserved_seats',
        'price',
        'user_id',
        'category_id',
        'event_status',
        'automatic_accept'

    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function users(){
        return $this->belongsToMany(User::class , 'reservations')->withTimestamps();
    }
}
