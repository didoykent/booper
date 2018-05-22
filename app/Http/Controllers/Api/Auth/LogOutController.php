<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class LogOutController extends Controller
{


  public function studentLogOut(Request $request){



      $validator = \Validator::make($request->all(), [

        'token' => 'required'

      ]);

      if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
      }

    try {

    JWTAuth::invalidate($request->token);

          return response()->json(['success' => true]);
    } catch (JWTException $e) {
       return response()->json($e);
    }





  }





}
