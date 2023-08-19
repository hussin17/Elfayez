<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'photo',
        'price',
        'level_id',
        'status',
        'major_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function level()
    {
        return $this->hasMany(Level::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

}
