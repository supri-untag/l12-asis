<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "articles";

    // ** Guard ID for not fill
    protected $guarded = ["id"];

}
