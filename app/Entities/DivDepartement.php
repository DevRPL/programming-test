<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivDepartement extends Model
{
    protected $guarded = [];

    public $table = 'div_departements';

    public $timestamps = false;

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
