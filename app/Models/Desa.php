<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cordinator;
use App\Models\Pemilih;
class Desa extends Model
{
    use HasFactory;
        protected $guarded = [];

        public function pemilih()
        {

            return $this->HasMany(Pemilih::class,'id','id_desa');

        }
        public function kordinator(){

            return $this->HasMany(Cordinator::class,'id','id_desa');

        }

}
