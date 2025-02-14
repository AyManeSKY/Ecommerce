<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nom', 'taille', 'description', 'prix','image'];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

  

}
