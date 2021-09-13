<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index(){
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function listSchools()
    {
        $schools = School::all();
        return response()->json($schools);
    }

    public function store(Request $request)
    {
        // This method will be hit when Vue component mounts,
        // storing the data we want into DB from api

        $school = School::firstOrCreate($request->post());
        return response()->json([
            'message'=>'School Stored Successfully!!',
            'school'=>$school
        ]);
    }
}
