<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $data = array("admin" => DB::table('admin')->orderBy('created_at', 'desc')->simplePaginate(10));
        return view('admin.index', $data);
        
    }

    public function show($id){
        $data = Admin::findOrFail($id);
        // dd($data);
        return view('admins.edit', ['employee' => $data]);
    }

    public function create(){
        return view('admins.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "fname" => ['required', 'min:4' ],
            "lname" => ['required', 'min:4' ],
            "gender" => ['required'],
            "age" => ['required',],
            "email" => ['required', 'email', Rule::unique('employees', 'email')]
            
        ]);

        Admin::create($validated);

        return redirect('/')->with('message', 'New Employee was added successfully');
    }

    public function update(Request $request, Admin $employee){
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

    public function destroy(Admin $employee){
        $employee->delete();
        return redirect('/')->with('message', 'Data was successfully deleted');
    }
}
