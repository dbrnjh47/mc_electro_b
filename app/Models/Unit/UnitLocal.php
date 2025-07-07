<?php

namespace App\Models\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitLocal extends Model
{
    /** @use HasFactory<\Database\Factories\Unit\UnitLocalFactory> */
    use HasFactory;

    public $timestamps = false;
}
