<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "theses";

    // ** Guard ID for not fill
    protected $guarded = "id";
}
