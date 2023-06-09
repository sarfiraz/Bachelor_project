<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'template_id',
        'title',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
     public function template(){
        return $this->belongsTo(Template::class, 'template_id', 'id');
     }

    public function subpages(){
        return $this->hasMany(Subpage::class);
    }

    public function displayStatuses(){
        return $this->hasMany(Subpage::class);
    }

    public function contact(){
        return $this->hasOne(Contact::class);
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, Subpage::class);
    }

}
