<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProject;
use App\Models\ServiceCategory;
use App\Helpers\Photo;
use Illuminate\Http\Response;

class ServiceProjectController extends Controller
{
    public function index()
    {
        $projects = ServiceProject::with('serviceCategory')->latest()->paginate(2);
        if ($projects) {
            return response()->json([
                'status' => 1,
                'data' => $projects,
            ],200);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Not found',
        ],200);
    }

    public function show(ServiceProject $project)
    {
        return response()->json($project, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_name' => 'required|string',
            'title' => 'required|string',
            'short_description' => 'required|string',
            'slug' => 'nullable|unique:service_projects',
            'project_url' => 'nullable|url',
            'service_category_id' => 'required|exists:service_categories,id',
        ]);

        if ($request->hasFile('thumbnail_image')) {
            Photo::upload($request->file('thumbnail_image'), 'uploads/service_project/photo', 'PROJECT', [640, 420]);
        }

        $data = $request->all();
        $data['thumbnail_image'] = Photo::$name;

        $project = ServiceProject::create($data);
        return response()->json($project, Response::HTTP_CREATED);
    }

    public function update(Request $request, ServiceProject $project)
    {
        $request->validate([
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_name' => 'required|string',
            'title' => 'required|string',
            'short_description' => 'required|string',
            'slug' => 'nullable|unique:service_projects,slug,' . $project->id,
            'project_url' => 'nullable|url',
            'service_category_id' => 'required|exists:service_categories,id',
        ]);

        if ($request->hasFile('thumbnail_image')) {
            if ($project->thumbnail_image) {
                Photo::delete($project->thumbnail_image);
            }

            Photo::upload($request->file('thumbnail_image'), 'uploads/service_project/photo', 'PROJECT', [640, 420]);
            $filePath = Photo::$name;
        } else {
            $filePath = $project->thumbnail_image;
        }

        $data = $request->all();
        $data['thumbnail_image'] = $filePath;

        $project->update($data);
        return response()->json($project, Response::HTTP_OK);
    }

    public function destroy(ServiceProject $project)
    {
        if ($project->thumbnail_image) {
            Photo::delete($project->thumbnail_image);
        }

        $project->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
