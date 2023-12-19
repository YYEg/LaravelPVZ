<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvzObjectType extends Model
{
    use HasFactory;
    protected $table = "pvz_objects_types";

    public $timestamps = false;
}
