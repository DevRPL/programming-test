<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
