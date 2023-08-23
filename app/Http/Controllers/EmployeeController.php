<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        // $data = Employees::where('age', '>=', 19)->orderBy
        // ('fname', 'asc')->limit(5)->get();
        // $data = DB::table('employees')
        //         ->select(DB::raw('count(*) as gender_count, gender'))
        //         ->groupBy('gender')->get();
        // $data = Employees::where('id', 101)->firstOrFail()->get();
        // return view('employees.index', ['employees' => $data]);
        // return 'Employees';
        // return view('employees.index');
        // $data = Employees::all();

        $data = array("employees" => DB::table('employees')->orderBy('created_at', 'desc')->simplePaginate(10));
        return view('employees.index', $data);
        
    }

    public function show($id){
        $data = Employees::findOrFail($id);
        // dd($data);
        return view('employees.edit', ['employee' => $data]);
    }

    public function create(){
        return view('employees.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "fname" => ['required', 'min:4' ],
            "lname" => ['required', 'min:4' ],
            "gender" => ['required'],
            "age" => ['required',],
            "email" => ['required', 'email', Rule::unique('employees', 'email')]
            
        ]);

        Employees::create($validated);

        return redirect('/')->with('message', 'New Employee was added successfully');
    }

    public function update(Request $request, Employees $employee){
        $validated = $request->validate([
            "fname" => ['required', 'min:4' ],
            "lname" => ['required', 'min:4' ],
            "gender" => ['required'],
            "age" => ['required',],
            "email" => ['required', 'email'],
        ]);

        $employee->update($validated);

        return back()->with('message', 'Successfully Updated');
    }

    public function destroy(Employees $employee){
        $employee->delete();
        return redirect('/')->with('message', 'Data was successfully deleted');
    }
}
