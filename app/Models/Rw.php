<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilih()
    {

        return $this->HasMany(Pemilih::class);

    }

}
