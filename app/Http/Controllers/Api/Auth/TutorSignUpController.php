<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Student;
use App\Tutor;

class TutorSignUpController extends Controller
{
    public function studentSignup(Request $request){

      //  protected $fillable = ['en_name', 'kr_name', 'email', 'password'];
      $validator = \Validator::make($request->all(),

      ['englishName' => 'required|string|max:35', 'koreanName' => 'required|string|max:35', 'email' => 'required|string|email|max:35|unique:students', 'password' => 'required|string|min:6|max:35|confirmed']);

        if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
        }


while(true){

  try{
        $student = Student::create([

            'en_name' => $request->englishName,
            'kr_name' => $request->koreanName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'chatroute' => str_random(30),
            'role' => "tutor"

        ]);



        $tutor = Tutor::create([
          'id' => $student->id,
          'en_name' => $request->englishName,
          'kr_name' => $request->koreanName,
          'email' => $request->email,
          'tutor_id' => $student->id,
          'password' => bcrypt($request->password),
          'chatroute' => str_random(30),
          'role' => "tutor"


        ]);

        break;

}catch(Exception $e){

}

}



        return response()->json(['success' => $student]);

    }


}
