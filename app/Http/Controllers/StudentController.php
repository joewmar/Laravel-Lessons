<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        //Model Lesson : Displaying data from model to view (eloquent)
        // $data = Students::all(); // SELECT * FROM students
        // $data = Students::where('id', 1)->get(); // SELECT * FROM students WHERE id = 1 (Using eloquent where query)
        // $data = Students::where('first_name', 'like', ' %bert%')->get(); // SELECT * FROM students WHERE first_name LIKE %bert% (Using eloquent wildcard query)
        // $data = Students::where('age', '>', 19)->get(); // SELECT * FROM students WHERE age > 19 (Using eloquent operand/comparision)
        // $data = Students::where('age', '>', 19)->orderBy('first_name', 'asc')->get(); // SELECT * FROM students WHERE age > 19 ORDER BY first_name ASC (Using eloquent order By query)
        // $data = Students::where('age', '>', 19)->limit(5)->orderBy('first_name', 'asc')->get(); // SELECT * FROM students WHERE age > 19 ORDER BY first_name ASC (Using eloquent limit query)
        // $data = DB::table('students')->select(DB::raw('count(*) AS gender_count, gender'))->groupBy('gender')->get(); // Using Eloquent for custom query
        // $data = Students::where('id', 101)->firstOrFail()->get(); // Using eloquent not found Exception
        // return view('students.index', ['studentsInfo' => $data]);

        // Laravel - Create Read Updated and Delete CRUD Functions 
        $data = array('studentsInfo' => DB::table('students')->orderBy('created_at', 'desc')->paginate(10));
        return view('students.index',  $data);
    }
    
    // For http://127.0.0.1:8000/student/[id]
    public function show($id)
    {
        $data = Students::findOrFail($id); // Using eloquent not found Exception
        // dd($data);
        return view('students.edit', ['student' => $data]);
    }
/////////////////////////////////////////////////////////////////////////////////////
    // Laravel Part 8 - Create Read Updated and Delete CRUD Functions 
    public function create(){
        return view('students.create')->with('title', 'Add New');
    }
    public function store(Request $request){
        // dd($request);
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')],
        ]);

        Students::create($validated);

        return redirect('/')->with('message', 'Add New Student Successfully');
    }
    public function update(Request $request, Students $students){
        // dd($request);
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email',]
        ]);

        $students->update($validated);

        return redirect('/')->with('message', 'Update Student Data was Successfully');
    }
    public function destroy(Students $students){
        $students->delete();

        return redirect('/')->with('message', 'Delete Student Data was Successfully');
    }
}
