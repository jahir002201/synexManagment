<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $deparments = Department::all();
        $users = User::all();
        $employee = Employee::all();
        return view('dashboard.employee.index',[
            'departments' => $deparments,
            'users' => $users,
            'employee' => $employee,
        ]);
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:14',
            'start_date' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'password' => 'required|confirmed |min:6',
            'password_confirmation' => 'required',

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as  $messages) {
                foreach ($messages as $message) {
                    toastr()->error($message, 'Invalid');
                }
            }
            return back()->withErrors($validator)->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->phone = $request->phone;
        $employee->start_date = $request->start_date;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->save();
        return back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.employee.profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        toastr()->success('Employee Deleted!', 'Deleted');
        return back();
    }
    public function getDesignations($departmentId)
    {
        // Fetch designations based on the departmentId
        $designations = Designation::where('department_id', $departmentId)->get();

        // Return the designations as JSON response
        return response()->json($designations);
    }
    public function searchEmployee(Request $request)
    {
        $searchKeyword = $request->input('name');

        $results = User::where('name', 'like', '%' . $searchKeyword . '%')->get();

        // Pass $results to your view or do further processing
        return view('dashboard.employee.index', [
            'resluts' =>$results,
        ]);

    }
}
