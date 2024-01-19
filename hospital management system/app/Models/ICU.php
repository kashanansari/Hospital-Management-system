<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class ICU extends Model
{
    protected $table = '_i_c_u';
    protected $fillable = [
       'Pateint_name',
       'Pateint_status',
       'admit_id',
       'Days',


   ];
    use HasFactory;
    public function getadmitid()
    {
        return $this->belongsTo('App\Models\admitted', 'admit_id', 'id');
    }
   public function deadpatients()
    {
        return $this->hasMany('App\Models\deadpatients', 'patient_id', 'id');
    }
}
