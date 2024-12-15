<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['client_id', 'pizza_id', 'etat','client_info'];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
