<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cordinator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilih()
    {
        return $this->BelongsTo(Pemilih::class);
    }
}
