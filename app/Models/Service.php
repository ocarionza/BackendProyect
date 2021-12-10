<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public function Technicians()
    {
        return $this->hasMany(Technician::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
