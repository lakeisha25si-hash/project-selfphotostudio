<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'icon'])]
class Facility extends Model
{
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'package_facility');
    }
}