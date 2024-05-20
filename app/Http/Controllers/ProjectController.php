<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Client;
use App\Models\Project;

use Akaunting\Money\Money;
use Illuminate\Http\Request;
use Akaunting\Money\Currency;
use Illuminate\Support\Facades\Validator;
use Kantorge\CurrencyExchangeRates\Facades\CurrencyExchangeRates;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('dashboard.project.projectlist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::has('employees')->pluck('name', 'id')->toArray();
        $client = Client::all();
        return view('dashboard.project.create',[
            'client' => $client,
            'employees' => $employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'client_id' => 'required',
            'daterange' => 'required',
            'budget'    => 'required',
            'leader' => 'required',
            'member' => 'required',
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

        $leadersArray = $request->leader; // This should be an array
        $leaders = $members = implode(',', $leadersArray);
        $membersArray = $request->member; // This should be an array
        $members = implode(',', $membersArray);


        $project = new Project();
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->budget = $request->budget;
        $project->dateRange = $request->daterange;
        $project->leader_id = $leaders;
        $project->member_id = $members;
        $project->status = $request->status;
        $project->priority = $request->priority;
        $project->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('dashboard.project.project_overview');
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
