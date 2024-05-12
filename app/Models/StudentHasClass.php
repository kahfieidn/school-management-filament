<?php

namespace App\Models;

use App\Models\Student;
use App\Models\HomeRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentHasClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'home_room_id',
        'periode_id',
        'is_open',
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function homeroom(){
        return $this->belongsTo(HomeRoom::class, 'home_room_id', 'id');
    }

}
