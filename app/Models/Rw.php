<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilih():BelongsTo{

        return this->BelongsTo(pemilih::class,'id','no_rw');

    }

}
