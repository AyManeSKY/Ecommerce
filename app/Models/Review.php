<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Review extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['client_id',	'order_id',	'note',	'commentaire'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Si un avis est lié à une pizza après la livraison
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
