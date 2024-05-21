<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
       return view('dashboard.project.projectlist',[
           'projects' => $projects,
       ]);
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

        $project = new Project();
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->budget = $request->budget;
        $project->description = $request->description;
        $project->dateRange = $request->daterange;
        $project->status = $request->status;
        $project->priority = $request->priority;
        $project->leader_id = $request->leader;
        $memberIds = implode(',', $request->member);
        $project->member_id = $memberIds;
        $project->save();
        flash()->success('Project created successfully');
        return redirect()->route('project.show', $project->id);




    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $project = Project::find($id);
        //leaders
        $leaderIds = explode(',', $project->leader_id);
        $leaders = User::whereIn('id', $leaderIds)->pluck('name')->toArray();
        //members
        $memberIds = explode(',', $project->member_id);
        $memberCount = User::whereIn('id', $memberIds)->pluck('name')->count();
        $members = User::whereIn('id', $memberIds)->pluck('name')->toArray();



        return view('dashboard.project.project_overview',[
            'project' => $project,
            'members' => $members,
            'memberCount' => $memberCount,
        ]);
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
