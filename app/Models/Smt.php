<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Smt extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "smts";

    // ** Guard ID for not fill
    protected $guarded = ["id"];

    public function quotas() : HasMany
    {
        return $this->hasMany(Quota::class, 'smt_id', 'id');
    }
}
