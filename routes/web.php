<?php

use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\RedirctController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Auth\RedirectController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\Exam\ExamController;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Skill\SkillController;
use App\Http\Controllers\Admin\Exam\QuestionController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Category\CategoryController;
use Illuminate\Http\Request;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('lang/{lang}',function($lang ,Request $request){
$acceptlangs=['en','ar'];
if(! in_array($lang,$acceptlangs)){
    $lang="en";
}
$request->session()->put("lang",$lang);
    return back();
})->name('lang');




Route::middleware("lang")->group(function(){
        Route::get('/',[HomeController::class,'popularExams'])->name('home_home');
        Route::get('category/{slug}',[HomeController::class, 'category'])->name('category');
        Route::get('skill/{slug}',[HomeController::class, 'skill'])->name('skill');
        Route::get('exam/{slug}',[HomeController::class, 'exam'])->name('exam');
        Route::group(['middleware'=>['auth']],function(){
            Route::post('questions/exam/{slug}',[HomeController::class, 'questions'])->name('questions')->middleware('can-inter-exam');
            Route::post('questions/exam/submit/{slug}',[HomeController::class, 'submitExam'])->name('submitExam');
        });

});


Auth::routes([
    'verify'=>true
]);
Route::get('/home', [RedirectController::class,  'redirect'])->name('home');



Route::group(['prefix'=>'dashboard','middleware'=>['auth','isAdmin']],function(){
    Route::get('/',[DashBoardController::class, 'index'])->name('dashboard');

    Route::group(['prefix'=>'category'],function(){
        Route::get('index',[CategoryController::class, 'index'])->name('allCategories');
        Route::post('store',[CategoryController::class, 'store'])->name('storeCategory');
        Route::post('update',[CategoryController::class, 'update'])->name('updateCategory');
        Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('deleteCategory');
    });

    Route::group(['prefix'=>'skill'],function(){
        Route::get('index',[SkillController::class, 'index'])->name('allSkills');
        Route::post('store',[SkillController::class, 'store'])->name('storeSkill');
        Route::post('update',[SkillController::class, 'update'])->name('updateSkill');
        Route::get('delete/{id}',[SkillController::class, 'delete'])->name('deleteSkill');
    });

    Route::group(['prefix'=>'exam'],function(){
        Route::get('index',[ExamController::class, 'index'])->name('allExams');
        Route::get('create',[ExamController::class, 'create'])->name('createExam');
        Route::get('show/{id}',[ExamController::class, 'show'])->name('showExam');
        Route::get('edit/{id}',[ExamController::class, 'edit'])->name('editExam');
        Route::post('store',[ExamController::class, 'store'])->name('storeExam');
        Route::post('update/{id}',[ExamController::class, 'update'])->name('updateExam');
        Route::get('delete/{id}',[ExamController::class, 'delete'])->name('deleteExam');
        Route::get('createQuestions/{id}',[ExamController::class, 'craeteQuestions'])->name('createQuestions');
        Route::post('storeQuestions/{id}',[ExamController::class, 'storeQuestions'])->name('storeQuestions');
        Route::group(['prefix'=>'questions'],function(){
            Route::get('index/{examId}',[QuestionController::class,'index'])->name('allQuestions');
            Route::post('store/{examId}',[QuestionController::class,'store'])->name('question.store');
            Route::post('update',[QuestionController::class,'update'])->name('question.update');
            Route::get('delete/{questionId}',[QuestionController::class,'delete'])->name('question.delete');
        });
    });

    Route::group(['prefix'=>'student'],function(){
        Route::get('index',[StudentController::class, 'index'])->name('allStudents');
        Route::get('show/{studentId}',[StudentController::class, 'show'])->name('studentScores');
        Route::get('delete/{studentId}',[StudentController::class, 'delete'])->name('studentDelete');
        Route::get('delete-exam/{examId}/{studentId}',[StudentController::class, 'deleteExamStudent'])->name('deleteExamStudent');
    });

    Route::group(['prefix'=>'admin','middleware'=>'super_admin'],function(){
        Route::get('index',[AdminController::class,'index'])->name('allAdmins');
        Route::post('store',[AdminController::class, 'store'])->name('storeAdmin');
        Route::get('up/{userId}',[AdminController::class, 'up'])->name('upAdmin');
        Route::get('down/{userId}',[AdminController::class, 'down'])->name('downAdmin');
    });

});


