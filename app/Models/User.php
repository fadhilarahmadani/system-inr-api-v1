<?php

namespace App;

use App\Models\Donatur;
use App\Models\InrData;
use App\Models\RecruiterData;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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
    public function recruiterData()
    {
        return $this->hasOne(RecruiterData::class);
    }


    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}