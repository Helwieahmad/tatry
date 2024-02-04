<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemilih extends Model
{
    use HasFactory;
        protected $guarded = [];

        public function kabupaten():HasOne
        {

            return this->HasOne(kabupaten::class,'kabupaten','id');

        }

        public function kecamatan():HasOne
        {

            return this->HasOne(kecamatan::class,'kecamatan','id');

        }

        public function desa():HasOne
        {

            return this->HasOne(desa::class,'desa','id');

        }

        public function rt():HasOne
        {

            return this->HasOne(rt::class,'no_rt','id');

        }

        public function rw():HasOne
        {

            return this->HasOne(rw::class,'no_rw','id');

        }

        public function tps():HasOne
        {

            return this->HasOne(tps::class,'no_tps','id');

        }

        public function kordinator():HasOne
        {

            return this->HasOne(kordinator::class,'kordinator','id');

        }
                        
}
