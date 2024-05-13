<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('dashboard.client.index',[
            'clients' => $clients,
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
            'phone' => 'required|max:14',

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
        $image_name = null;
        if($request->image){
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $image_name ='CLNT_'.Str::random(8).'.'.$extension;
           Image::make($file)->resize(150,150)->save( public_path('uploads/client/'.$image_name));
        }
        $client = new Client();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->image = $image_name;
        $client->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.client.profile');
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
        //
    }
}
