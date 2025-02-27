<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\StudentController;

Route::get('/hom', function () {
    return view('abc');
});


Route::get('/form', function () {
    return view('form');
});

Route::get('/about', function () {
    return view('about');

    // abort(500); //abort can be used to show proper error pages and stop the execution;
    // die();
    // $name = 'check';
    // dd($name); //means dump and die and shows code info
    // return redirect('/home'); //redirect should be used with return and it redirects the page to given directory
    // return back(); //it can only be used when there is a page to go back
});

Route::get('/gallery', function(){
    // return view('xyz');
    echo app_path() ;
    echo"<br>";
    echo base_path();
    echo "<br>";

    echo resource_path();
    echo "<br>";
    echo public_path();
    echo "<br>";

})->name('gallery');

Route::get('/user/{userid}', function($userid){
    return $userid;
})-> where('id', '[a-z]+', '[0-9]+'); //regex regular expression

Route::get('/', function () {
    $name= 'ashish';
    $add = 'pokhara';
    return view('welcome',[
                'name' => $name,
                'address' => $add
                ]);
                
            })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/students', function () {
    // return view('home');
    // $students = Student::all();
    // $students = Student::first();
    // $students = Student::where('add','Pokhara1')->get(''); // this line doesnot work because P is capital
    // $students = Student::where('gender', 2)->get();
    // $students = Student::where('add', 'pokhara1')->get();
    // $students = Student::where('add', 'pokhara1')->where('gender', 2)->get();
    // $students = Student::where('add', 'pokhara1')->orwhere('add', 'pokhara-14')->get();
    // $student = $student::all(); // collection
    // $student = $student::first(); // model
    // $student = $student::where('add','pokhara1'); // collection
    // $students1 = student::find(1); //it fetches data from model
    // $students2 = student::where('id', 2)->get(); //it fetches data from database
    $students2= student::all();

    return view('students', ['students2' => $students2, 'students2' => $students2]);

});
Route::get('/student-registration', function(){
    return view('register');
});

// Route::post('/registration', function(){
    // echo "registrating";

// });

Route::post('/registration', [StudentController::class,'registration'])->name('registration');

Route::get('/delete/{id}',[StudentController::class,'delete'])->where('id','[0-9]+'); //get is used for anchor tag

Route::get('/update/{id}', [StudentController::class,'updateForm']);

Route::post('/update', [StudentController::class,'update']);
// ('nameofview or the name of the post url', [controllername::class,'functionname inside the class'])


