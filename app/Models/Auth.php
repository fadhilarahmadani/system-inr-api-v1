<?php

namespace App\Models;

use App\Models\Donatur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auth extends Model
{
    use HasFactory;

    protected $table = "auths";

    public function donatur()
    {
        return $this->hasOne(Donatur::class);
    }
    public function inrData()
    {
        return $this->hasOne(InrData::class);
    }
}
