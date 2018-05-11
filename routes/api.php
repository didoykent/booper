<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/






Route::post('student_signup', 'Api\Auth\SignUpController@studentSignUp');
Route::post('tutor_signup', 'Api\Auth\TutorSignUpController@studentSignUp');
Route::post('student_signin', 'Api\Auth\SignInController@studentSignIn');

Route::post('student_logout', 'Api\Auth\LogOutController@studentLogOut');

Route::group(['middleware' => ['jwt.auth']], function(){

  Route::get('getStudents', 'StudentController@index');
  Route::get('getTutors', 'StudentController@getTutors');
  Route::post('addTutor', 'StudentController@addTutor');
  Route::get('getFriendLists', 'Api\Auth\ChatController@getFriendLists');
  Route::get('getUserId', 'Api\Auth\ChatController@getCurrentUserId');
  Route::get('getUnreadMessages', 'Api\Auth\ChatController@getUnreadMessages');
  Route::post('saveMessage', 'Api\Auth\ChatController@saveMessage');
  Route::put('editMessage/{id}', 'Api\Auth\ChatController@editMessage');
  Route::post('getMessages', 'Api\Auth\ChatController@getMessages');
  Route::post('initializeData', 'Api\Auth\ChatController@initializeData');


});

Route::get('getAllStudents', 'Api\RecordingController@getData');


Route::post('audio_recording', 'Api\RecordingController@getFileRecording');
