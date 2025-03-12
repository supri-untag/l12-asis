<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lecture extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "lectures";

    // ** Guard ID for not fill
    protected $guarded = ["id"];

    public function promotors() : HasMany
    {
        return $this->hasMany(Thesis::class, 'promotor', 'nidn');
    }

    public function methods() : HasMany
    {
        return $this->hasMany(Thesis::class, 'method', 'nidn');
    }
    public function examiners() : HasMany
    {
        return $this->hasMany(Thesis::class, 'examiners', 'nidn');
    }
    public function leaders() : HasMany
    {
        return $this->hasMany(Thesis::class, 'leader', 'nidn');
    }

    public function quotas() : HasMany
    {
        return $this->hasMany(Quota::class, 'nidn', 'nidn');
    }
}
