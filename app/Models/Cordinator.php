<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Desa;
use App\Models\Cordinator;
class Cordinator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilih()
    {
        return $this->HasMany(Pemilih::class,'id','id_kordinator');
    }

    public function desa()
    {
        return $this->BelongsTo(Desa::class,'id_desa','id');
    }

}
