<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'references' => 'json'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
