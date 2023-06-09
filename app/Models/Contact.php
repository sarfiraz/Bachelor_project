<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_id',
        'name',
        'email',
        'message'
    ];

    public function website(){
        return $this->belongsTo(Website::class, 'website_id', 'id');
    }
}
