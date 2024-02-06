<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemlih;

class Tps extends Model
{
    use HasFactory;
        protected $guarded = [];

        public function pemilih()
        {

            return $this->HasMany(Pemilih::class);

        }

}
