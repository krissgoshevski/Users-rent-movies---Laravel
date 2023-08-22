<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',

        // mesto ovie defaulnite gi zamenuvame so tie sto ni trebaat vo user modelot da se pojavat na view 
        // ovie podatoci treba da gi vneseme 
        // vo fillable gi stavame polinjata koi sto userot ke treba da gi vnese 
        'firstname',
        'lastname',
        'age',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    // relacija so role modelot 
    // sekoj user moze da ima    edna rolja 
    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    // so role pristpauvam do metodot role() sto mi e gorniot i go vrakam imeto kaj so e admin
    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }



    // vrska za so movie modelot dali e available filmot ili ne e 
    // eden user moze da izrenta poveke filmovi 
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
       
    }
}
