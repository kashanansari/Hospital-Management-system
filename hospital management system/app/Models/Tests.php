<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Tests extends Model
{
    use HasFactory;
    public function getpateintidtests()
    {
        return $this->belongsTo('App\Models\Patients', 'pateint_id', 'id');
    }
    protected $table = '_tests';
    protected $fillable = [
        'pateint_id',
        'date',
        'time',
        'result'


    ];

}
