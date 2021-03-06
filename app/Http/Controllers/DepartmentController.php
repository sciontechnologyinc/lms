<?php

namespace App\Http\Controllers;

use App\Book;
use App\Bookissue;
use App\Category;
use App\Subject;
use App\Department;
use App\Generalsettings;
use App\Member;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Psy\debug;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $departments = Department::orderBy('id')->get();
        return view('grades.index', ['departments' => $departments]);
    }

    public function departmentdropdown()
    {
	    $departments = Department::orderBy('id')->get();
        return view('members/create', ['departments' => $departments]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->all();
         $data = $request->validate([
            'departmentname' => 'required|unique:departments|',

            
        ]);
        Department::create($data);

        return redirect()->back()->with('success','Added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$department = Department::find($id);
        return view('grades/edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $data = $request->all();
        $department->update($data);

	    Session::flash('success', $department['departmentname'] . ' Updated successfully');
        return redirect('/grades')->with('success','Updated successfuly');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $department = Department::find($id);
	    $department->delete($id);

	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
