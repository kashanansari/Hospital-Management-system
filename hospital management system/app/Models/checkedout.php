<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class checkedout extends Model
{
    use HasFactory;
    protected $table = 'checkedout';
    protected $fillable = [
        'pateint_id',
        'Bill',


    ];

    public function getadmitid()
    {
        return $this->belongsTo('App\Models\admitted', 'pateint_id', 'id');
    }
}
