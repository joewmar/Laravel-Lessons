<?php

// use GuzzleHttp\Psr7\Request;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return 'About';
// //  http://127.0.0.1/about

// });

// Route::get();
// Route::post();
// Route::put(); // Pag-update
// Route::patch(); // Pag-update ng partial data
// Route::delete(); // Remove data
// Route::options(); // 

// Allow to enter the types of route
// Route::match(['get', 'post'], '/', function(){
//     return 'POST and GET are allowed';
// });

//Any request
// Route::any('/', function(){
//     return 'Welcome';
// });

// View
// Route::view('/welcome','Welcome');

// Redirect
// Route::get('/', function () {
//     return 'redirected';
// });
// Route::redirect('/welcome', '/');
// Route::permanentRedirect('/welcome', '/');

////////////////////////////////////////////////////////////////

//Request response
// Route::get('/', function () {
//     return 'Welcome!';
// });
// Route::get('/users', function(Request $request){
//     dd($request);
//     return null;
// });
// Route::get('/get-text', function(){
//     return response('Hello World', 200)
//             ->header('Content-Type', 'text-plain');
// });

// Parameter Route
// Route::get('/users/{id}/{group}', function($id, $group){
//     return response($id. '-' .$group, 200);
//     //http://127.0.0.1:8000/users/258/apple
// });

//Return JSON Data
// Route::get('/request-json', function(){
//     return response()->json(['name' => 'Hello World', 'age' => '21']);
// });

//Download to user
// Route::get('/request-download', function(){
//     $path = public_path().'/sample.txt';
//     $name = 'sample.txt';
//     $headers = array(
//         'Content-type : application/text-plain', 
//     );
//     return response()->download($path, $name, $headers);
// });
////////////////////////////////////////////////////////////////

// Controller: Connecting route to controller
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);

// Controller: Using middleware 
// Route::get('/', function () {
//     return view('welcome');
// });
    // Route::get('/users', [UserController::class, 'index'])->name('login'); // Routing naming
// Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth'); // to protect the route
// Route::get('/users', [UserController::class, 'index'])->name('login');
// Route::get('/user/{id}', [UserController::class, 'show']); 

//////////////////////////////////////////////////////////////////////////

// Model Lesson
// Route::get('/students', [StudentController::class, 'index']);
// Route::get('/', [StudentController::class, 'index']);
// Route::get('/student/{id}', [StudentController::class, 'show']);   // For http://127.0.0.1:8000/student/[id]

//////////////////////////////////////////////////////////////////////////

// View Lesson: Partial and Components 
//Common routes naming
//  index - show all data or students
//  show - show a single data or students
//  create - show a form to add data or students
//  store - store data 
//  update - update data 
//  destroy - delete data 
// Route::get('/', [StudentController::class, 'index']);
// Route::get('/register', [UserController::class, 'register']);
// Route::get('/login', [UserController::class, 'login']);

/////////////////////////////////////////////////////////////////////////

// Laravel Part 7 - Authentication Register Login and Logout
// Route::get('/', [StudentController::class, 'index'])->middleware('auth');
// Route::get('/register', [UserController::class, 'register']);
// Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Route::post('/login/process', [UserController::class, 'process']);
// Route::post('/logout', [UserController::class, 'logout']);

// Route::post('/store', [UserController::class, 'store']);

// Laravel Part 8 - Create Read Updated and Delete CRUD Functions 


Route::controller(StudentController::class)->group(function(){
    Route::get('/', 'index')->middleware('auth');
    Route::get('add/student',  'create'); // Add New Student
    Route::post('add/student', 'store'); // Add New Student Processing
    Route::get('/student/{id}', 'show'); // Show Data Student (UPDATE)
    Route::put('/student/{id}', 'update'); // Update Student Processing
    Route::delete('/student/{id}', 'destroy'); // Delete Student Processing
});
Route::controller(UserController::class)->group(function(){
    Route::get('/register', 'register');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');
    Route::post('/logout', 'logout');
    Route::post('/store', 'store');
});