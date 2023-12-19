<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvzObject extends Model
{
    use HasFactory;

    protected $table = "pvz_objects";

    public $timestamps = false;
}
