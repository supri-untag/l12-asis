<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "students";

    // ** Guard ID for not fill
    protected $guarded = ["id"];

    public function thesis() : HasOne
    {
        return $this->hasOne(Thesis::class, 'student_id', 'nim');
    }

    public function user() :HasOne
    {
        return $this->hasOne(User::class, 'nim', 'nim');
    }
}
