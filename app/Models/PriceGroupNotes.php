<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceGroupNotes extends Model
{
    use HasFactory;
    protected $table = 'price_group_notes';
    protected $fillable = [
        'donatur_id',
        'price',
        'description',
        'type'

    ];
    public function Donatur()
    {
        return $this->belongsTo(Donatur::class);
    }
}