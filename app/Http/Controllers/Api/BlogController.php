<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogsResource;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('view_count', 'desc')->take(4)->get();
        $bestOne = new BlogsResource($blogs->first());
        $bestThree = BlogsResource::collection($blogs->skip(1)->take(3));

        $latest = BlogsResource::collection(Blog::latest()->paginate(1));
        if ($latest) {
            return response()->json([
                'status' => 1,
                'bests' => [
                    'bestOne' => $bestOne,
                    'bestThree' => $bestThree,
                ],
                'latest' => $latest,
                'pagination' => [
                    'total' => $latest->total(),
                    'count' => $latest->count(),
                    'per_page' => $latest->perPage(),
                    'current_page' => $latest->currentPage(),
                    'total_pages' => $latest->lastPage(),
                ],
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Not found',
        ], 200);

        return response()->json($blogs);
    }

    public function homeitem()
    {
        $popularBlog = new BlogsResource(Blog::orderBy('view_count', 'desc')->first());
        $blogs = BlogsResource::collection(Blog::get()->take(4));

        if ($blogs) {
            return response()->json([
                'status' => 1,
                'popular' => $popularBlog,
                'blogs' => $blogs,
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Not found',
        ], 200);

        return response()->json($blogs);
    }
}
