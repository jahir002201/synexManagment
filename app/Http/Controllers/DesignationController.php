<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'designation' => 'required',
        ],[
            'department_id'=> 'Please Select Department!',
            'designation'=> 'Please Provide Designation!',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as  $messages) {
                foreach ($messages as $message) {
                    flash()->options([
                        'position' => 'bottom-right',
                    ])->error($message);
                }
            }
            return back()->withErrors($validator)->withInput();
        }

       $designation = new Designation();
       $designation->department_id = $request->department_id;
       $designation->designation = $request->designation;
       $designation->save();
       flash()->options([
                        'position' => 'bottom-right',
                    ])->success('Designation Added Successfully');
       return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        $data = $designation;
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'designation' => 'required',
        ],[
            'department_id'=> 'Please Select Department!',
            'designation'=> 'Please Provide Designation!',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as  $messages) {
                foreach ($messages as $message) {
                    flash()->options([
                        'position' => 'bottom-right',
                    ])->error($message);
                }
            }
            return back()->withErrors($validator)->withInput();
        }


       $designation->department_id = $request->department_id;
       $designation->designation = $request->designation;
       flash()->options([
                        'position' => 'bottom-right',
                    ])->success('Designaiton Updated successfully!');
       $designation->save();
       return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        flash()->options([
                        'position' => 'bottom-right',
                    ])->success('Designation Deleted!');
        return back();
    }
}
