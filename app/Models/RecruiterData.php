<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterData extends Model
{
    use HasFactory;
    protected $table = 'recruiter_data';
    protected $fillable = [
        'auth_id',
        'nama',
        'photo_profile',
        'class',
        'status',
        'type_proses'
    ];
    public function auth()
    {
        return $this->belongsTo(Auth::class, 'auth_id');
    }
}