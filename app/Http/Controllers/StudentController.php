<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Tutor;
class StudentController extends Controller
{


    public function index(Request $request){




      return response()->json(Student::orderBy('id', 'asc')->get());
    }


    public function getTutors(){

        $tutor = Tutor::all();

        return response()->json($tutor);
    }

    public function addTutor(Request $request){

$tutorid = $request->id;
$tutor = Tutor::find($tutorid);

$authuser = JWTAuth::toUser(JWTAuth::getToken());
$student = Student::find($authuser->id);

$student->tutor()->associate($tutor);
$student->save();
$tutor->student->add($student);


$tutor->save();

      return response()->json($authuser);
    }
}
