<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\Auth\RestPasswordController;
use App\Http\Controllers\Api\Auth\VerfiedController;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\LangController;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






/*
colum access_token
register
login
middeware auth
logout
middleware can enter exam

startExam

submitExam
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::get('lang/{lang}',[LangController::class, 'setLang'])->name('lang');

Route::group(['prefix'=>'auth'],function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout'])->middleware('auth-api');
    Route::post('email/verfied',[VerfiedController::class,'verfiedEmail']);
    Route::post('email/verfied/resendCode',[VerfiedController::class,'resendCode']);
    Route::post('forget/password',[ForgetPasswordController::class,'ForgetPassword']);
    Route::post('rest/password',[RestPasswordController::class,'RestPassword']);
});


    Route::get('/popularExams',[ExamController::class,'popularExams']);
    Route::get('showExam/{ExamId}',[ExamController::class, 'showExam']);
    Route::get('/categories',[CatController::class, 'index']);
    Route::get('/showcategory/{id}',[CatController::class, 'show']);
    Route::get('skills',[SkillController::class, 'index']);
    Route::get('showSkill/{id}',[SkillController::class, 'show']);
    Route::group(['prefix'=>'exam','middleware'=>'auth-api'],function(){
    Route::post('start/{ExamId}',[QuestionController::class, 'startExam'])->middleware('api-can-enter-exam');
    Route::post('submit/{ExamId}',[QuestionController::class, 'submitExam'])->middleware('submit-exam-api');
    });





