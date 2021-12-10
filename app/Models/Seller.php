<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'address',
        'description',
        'rating',
        'image',
        'facebook',
        'twitter',
        'instagram',
    ];

    public function Shop_Comments()
    {
        return $this->hasMany(Shop_Comment::class);
    }

    public function Users()
    {
        return $this->belongTo(User::class);
    }
}
