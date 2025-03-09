<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Thesis extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "theses";

    // ** Guard ID for not fill
    protected $guarded = "id";

    public function students() : HasOne
    {
        return $this->hasOne(Student::class, 'nim', 'student_id');
    }

    public function promotors() : BelongsTo
    {
        return $this->belongsTo(Lecture::class, 'promotor','nidn');
    }

    public function examiners() : BelongsTo
    {
        return $this->belongsTo(Lecture::class, 'examiner','nidn');
    }

    public function methods() : BelongsTo
    {
        return $this->belongsTo(Lecture::class, 'method','nidn');
    }

    public function leaders() : BelongsTo
    {
        return $this->belongsTo(Lecture::class, 'leader','nidn');
    }

    public function quotas() : HasOneThrough
    {
        return $this->hasOneThrough(
            Quota::class,
            Lecture::class,
            'nidn',
            'nidn',
            'promotor',
            'nidn'
        );
    }

}
