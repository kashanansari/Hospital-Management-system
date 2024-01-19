<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class deadpatients extends Model
{use HasFactory;

    protected $table = 'deadpatients';

    protected $fillable = [
        'patient_id',
    ];

    public function icu()
    {
        return $this->belongsTo('App\Models\ICU', 'patient_id', 'id');
    }
}
