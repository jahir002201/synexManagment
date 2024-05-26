<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('dashboard.profile');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $user = User::find($id);
        $employee = $user->employees;
        //social
        if($request->icon && $request->link){
            $social = new Social;
            $social->user_id = $id;
            $social->icon = $request->icon;
            $social->link = $request->link;
            $social->save();
            flash()->options(['position' => 'bottom-right'])->success('Social Added successfully');
            return back();
        }
        //personal information
        if($request->personal == 1){

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email,'. $id,
                'address' => $user->employees->address? 'required' : 'nullable',
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

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->save();
            flash()->options(['position' => 'bottom-right'])->success('Data Updated successfully');
            return back();
        }
        if($request->imgBtn == 1){
            $validator = Validator::make($request->all(), [
                'image' => 'required',

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
            $file = $request->image;

            $extension = $file->getClientOriginalExtension();
            $image_name ='EMPLOYEE_'.Str::random(8).'.'.$extension;
           Image::make($file)->resize(150,150)->save( public_path('uploads/employee/'.$image_name));
            $employee->image = $image_name;
            $employee->save();
            flash()->options(['position' => 'bottom-right'])->success('Image Updated successfully');
            return back();

        }
        if($request->passBtn == 1){
            $validator = Validator::make($request->all(), [
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if (!Hash::check($value, Auth::user()->password)) {
                            $fail('The current password is incorrect.');
                        }
                    },
                ],
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required',
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

            $user->password = Hash::make($request->password_confirmation);
            $user->save();
            flash()->options(['position' => 'bottom-right'])->success('Password Updated successfully');
            return back();
        }
        if($request->notEmployee == 1){
             $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'. $id,
            ]);
            if($request->old_password){
                $validator = Validator::make($request->all(), [
                    'old_password' => [
                        'required',
                        function ($attribute, $value, $fail) {
                            if (!Hash::check($value, Auth::user()->password)) {
                                $fail('The current password is incorrect.');
                            }
                        },
                    ],
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' => 'required',
                ]);
                $user->password = Hash::make($request->password_confirmation);
            }
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
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return back();

        }

        flash()->options(['position' => 'bottom-right'])->error('Something went wrong! Blank fields are not allowed');
        return back();

        // $user= User::find($id);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,'. $id,
        // ]);
        // if($request->old_password){
        //     $validator = Validator::make($request->all(), [
        //         'old_password' => [
        //             'required',
        //             function ($attribute, $value, $fail) {
        //                 if (!Hash::check($value, Auth::user()->password)) {
        //                     $fail('The current password is incorrect.');
        //                 }
        //             },
        //         ],
        //         'password' => 'required|confirmed|min:6',
        //         'password_confirmation' => 'required',
        //     ]);
        //     $user->password = Hash::make($request->password_confirmation);
        // }
        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     foreach ($errors->messages() as  $messages) {
        //         foreach ($messages as $message) {
        //             flash()->options([
        //                 'position' => 'bottom-right',
        //             ])->error($message);
        //         }
        //     }
        //     return back()->withErrors($validator)->withInput();
        // }


        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->save();
        // return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
