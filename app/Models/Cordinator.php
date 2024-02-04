<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class Cordinator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pemilih():HasMany
    {
        return this->HasMany(pemilih::class,'id','kordinator');
    }
}
