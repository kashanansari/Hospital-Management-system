<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctors extends Model
{
    use HasApiTokens, HasFactory,Notifiable;
    protected $table = '_doctors';
    protected $fillable = [
       'name',
       'email',
       'password',
       'specialization',

   ];
   protected $hidden = [
    'password',
    'remember_token',
];
}
