<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'html'
    ];

    public function websites(){
        return $this->hasMany(Website::class);
    }
}
