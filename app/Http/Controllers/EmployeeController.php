<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

        return view('employees.index');
        
    }

    public function show($id){
        $data = Employees::findOrFail($id);

        return view('employees.index', ['employees' => $data]);
    }
}
