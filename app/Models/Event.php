<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;




    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'total_seats',
        'reserved_seats',
        'price',
        'createdBy',
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

    public function creater(){
        return $this->belongsTo(User::class, 'createdBy');
    }
}
