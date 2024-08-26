<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogsResource;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = BlogsResource::collection(Blog::paginate(10));
        if ($blogs) {
            return response()->json([
                'status' => 1,
                'blogs' => $blogs,
                'pagination' => [
                    'total' => $blogs->total(),
                    'count' => $blogs->count(),
                    'per_page' => $blogs->perPage(),
                    'current_page' => $blogs->currentPage(),
                    'total_pages' => $blogs->lastPage(),
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
