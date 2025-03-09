<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quota extends Model
{
    use HasUuids;

    // ** Definition Table
    protected $table = "quotas";

    // ** Guard ID for not fill
    protected $guarded = "id";

    public function lectures() : BelongsTo
    {
        return $this->belongsTo(Lecture::class, 'nidn', 'nidn');
    }

    public function smts() : BelongsTo
    {
        return $this->belongsTo(Smt::class, 'smt_id', 'id');
    }
}
