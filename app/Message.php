<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Tutor;
class Message extends Model
{
    protected $table = 'messages';


    protected $fillable = ['message', 'avatar', 'name', 'tutors_id', 'student_id', 'read', 'from_student', 'from_tutor'];


    protected $hidden = ['remember_token'];


    public function student(){

      return $this->belongsTo(Student::class);

    }

    public function tutor(){

      return $this->belongsTo(Tutor::class);
    }
}
