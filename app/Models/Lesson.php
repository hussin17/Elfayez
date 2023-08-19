<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function video()
    {
        return $this->hasOne(LessonVideo::class);
    }
    public function file()
    {
        return $this->hasMany(LessonFile::class);
    }
    public function image()
    {
        return $this->belongsTo(LessonImage::class);
    }

}
