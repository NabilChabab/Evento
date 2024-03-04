<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'description',
    ];


    public function user(){
        return $this->hasOne(User::class);
    }
}
