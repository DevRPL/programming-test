<?php

namespace App\Entities;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
