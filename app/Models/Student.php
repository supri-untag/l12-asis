<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "students";

    // ** Guard ID for not fill
    protected $guarded = "id";
}
