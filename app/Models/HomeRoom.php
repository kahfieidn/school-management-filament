<?php

namespace App\Models;

use App\Models\Periode;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'classroom_id',
        'periode_id',
        'is_open',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }

    public function periode(){
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}
