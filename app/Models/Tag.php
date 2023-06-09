<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'subpage_id',
        'key',
        'tag_type',
        'tag_value',
        'tag_attribute',
        'attribute_value'
    ];

    public function subpage(){
        return $this->belongsTo(Subpage::class, 'subpage_id', 'id');
    }
}
