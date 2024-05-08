<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::aLL();
        $designations = Designation::all();
        return view('dashboard.department.index',['departments' => $departments,'designations' => $designations,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            // Validate the request
            $request->validate([
                'department' =>'required',
            ]);
            Department::create($request->all());
            toastr()->success('Department Added successfully!','Done');
        } catch (ValidationException $e) {
            toastr()->error('Department Name Required!', 'Invalid');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Department::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'department' =>'required',
            ]);
            Department::find($id)->update([
                'department' => $request->department,
            ]);
            toastr()->success('Department Updated successfully!','Updated');
        } catch (ValidationException $e) {
            toastr()->error('Department Name Required!', 'Invalid');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::find($id)->delete();
        toastr()->success('Deparment Deleted!', 'Deleted');
        return back();
    }
}
