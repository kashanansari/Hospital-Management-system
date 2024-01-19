<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class admitted extends Model
{
    use HasFactory;
    protected $fillable = [
        'pateint_id',
        'Disease',
        'BillPayment'


    ];
    protected $table = 'admitted';
    function getpateintid()
    {
        return $this->belongsTo('App\Models\Patients', 'pateint_id', 'id');
    }
    function admitid()
    {
        return $this->hasMany('App\Models\checkedout', 'pateint_id', 'id');
    }
    function admit_id()
    {
        return $this->hasMany('App\Models\ICU', 'admit_id', 'id');
    }
}
