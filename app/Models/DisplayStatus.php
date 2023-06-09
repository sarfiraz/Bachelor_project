<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_id',
        'element_id',
        'display'
    ];

    public function website(){
        return $this->belongsTo(Website::class, 'website_id', 'id');
    }
}
