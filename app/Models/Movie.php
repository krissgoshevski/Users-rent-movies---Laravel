<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Movie extends Model
{
    use HasFactory;


    // mora vo modelot koga koristime Reqyest so validated() metodata da se stavat site polinja vo fillable za da pomine requestot 
     protected $fillable = [
        'title',
        'genre',
        'cost'
    ];


    // relacija megu movie i users
    // eden film moze da pripaga na poveke useri
    // bidjeki so pivot tabela mora many to many vrska da stavime 
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function isAvailableMovie()
    {
        return !$this->users()->exists(); 
         // proveruvame dali postoi zapis vo PIVOT tabelata za toj film,
         // ako postoi zapis togas toj film veke ne e dostapen odnosno e izrentan
    }


    public function rentMovie()
    {
        // proveruvame dali e dostapen filmot, od gorniot metod,
        // ako e dostapen togas moze da go rentame
        if($this->isAvailableMovie())
        {
                $this->users()->attach(Auth::id()); // da go atacirame id-to na logiraniot user 
                return true;
        }

        return false;
    }



   

}
