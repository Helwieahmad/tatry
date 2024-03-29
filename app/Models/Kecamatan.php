<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemilih;

class Kecamatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilih()
    {

        return $this->HasMany(Pemilih::class,'id','id_kecamatan');

    }

}
