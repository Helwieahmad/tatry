<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Tps;
use App\Models\Cordinator;

class Pemilih extends Model
{
    use HasFactory;
        protected $guarded = [];

        public function kabupaten()
        {

            return $this->BeLongsTo(Kabupaten::class,'id_kabupaten','id');

        }

        public function kecamatan()
        {

            return $this->BeLongsTo(Kecamatan::class,'id_kecamatan','id');

        }

        public function desa()
        {

            return $this->BeLongsTo(Desa::class,'id_desa','id');

        }

        public function rt()
        {

            return $this->BeLongsTo(Rt::class,'id_rt','id');

        }

        public function rw()
        {

            return $this->BeLongsTo(Rw::class,'id_rw','id');

        }

        public function tps()
        {

            return $this->BeLongsTo(Tps::class,'id_tps','id');

        }

        public function kordinator()
        {

            return $this->BeLongsTo(Cordinator::class,'id_kordinator','id');

        }

}
