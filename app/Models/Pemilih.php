<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;
        protected $fillable = [];

        public function kabupaten()
        {

            return $this->BeLongsTo(Kabupaten::class,'kabupaten','id');

        }

        public function kecamatan()
        {

            return $this->BeLongsTo(Kecamatan::class);

        }

        public function desa()
        {

            return $this->BeLongsTo(Desa::class);

        }

        public function rt()
        {

            return $this->BeLongsTo(Rt::class);

        }

        public function rw()
        {

            return $this->BeLongsTo(Rw::class);

        }

        public function tps()
        {

            return $this->BeLongsTo(Tps::class);

        }

        public function kordinator()
        {

            return $this->BeLongsTo(Cordinator::class);

        }

}
