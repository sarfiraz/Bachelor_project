<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpage extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_id',
        'key',
        'display'
    ];

    public function website(){
        return $this->belongsTo(Website::class, 'website_id', 'id');
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }
}
