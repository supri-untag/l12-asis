<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "lectures";

    // ** Guard ID for not fill
    protected $guarded = "id";
}
