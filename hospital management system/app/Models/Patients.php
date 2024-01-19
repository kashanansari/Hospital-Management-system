<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
       'name',
       'email',
       'password',
       'Insurance',

   ];

//    * @var array<int, string>
   protected $hidden = [
    'password',
    'remember_token',
];
protected $casts = [
    'email_verified_at' => 'datetime',
];
    function patientid()
    {
        return $this->hasMany('App\Models\admitted', 'pateint_id', 'id');
    }
    function patientidtests()
    {
        return $this->hasMany('App\Models\Tests', 'pateint_id', 'id');
    }
}
