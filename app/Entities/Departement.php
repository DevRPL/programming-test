<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function divisions()
    {
        return $this->belongsToMany(Division::class, 'div_departements');
    }
}
