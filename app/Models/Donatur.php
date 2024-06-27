<?php

namespace App\Models;

use App\Models\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donatur extends Model
{
    use HasFactory;
    protected $table = 'donaturs';

    protected $fillable = [
        'auth_id',
        'status',
        'total_price'
    ];

    public function auth()
    {
        return $this->belongsTo(Auth::class, 'auth_id');
    }
    public function priceGroupNotes()
    {
        return $this->hasOne(priceGroupNotes::class, 'donatur_id');
    }

}