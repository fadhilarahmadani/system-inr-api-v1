<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InrData extends Model
{
    use HasFactory;
    protected $table = 'inr_data';
    protected $fillable = [
        'auth_id',
        'name',
        'photo_profile',
        'class',
        'status'
    ];
    public function auth()
    {
        return $this->belongsTo(InrData::class, 'auth_id'); //belongsto karena inr data yang punya id pk jadi dia yag memanggil auth
    }
}
