<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom' ,
        'prenom',
        'email',
        'telephone' ,
        'adresse' ,
        'articles_commandes',
        'total' ,
        'statut' ,
        'date_reservation'];


    protected $dates = ['date_reservation'];

    public static function boot()
    {
        parent::boot();

        // Set the date_reservation field automatically when creating a new reservation
        static::creating(function ($reservation) {
            $reservation->date_reservation = now();
        });
    }
}