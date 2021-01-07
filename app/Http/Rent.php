<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rent extends Model
{
    use HasFactory;
    
    public function user (){
        return $this->belongsToMany(User::class,'users');
    }
    protected $fillable = [
        'userId',
        'title',
        'createdAt',
        'returnDate'
    ];
    protected $casts = [
        'createdAt' => 'datetime',
    ];
}
