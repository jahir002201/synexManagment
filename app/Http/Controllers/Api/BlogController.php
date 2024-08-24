<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Employee;
use App\Models\User;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with(['employee.user', 'category'])
            ->latest()
            ->paginate(2)
            ->through(function ($blog) {
                return [
                    'employee_name' => $blog->employee->user->name,
                    'category_name' => $blog->category->name,
                    'title' => $blog->title,
                    'content' => $blog->content,
                    'image' => $blog->image,
                    'view_count' => $blog->view_count,
                    'status' => $blog->status,
                    'seo_title' => $blog->seo_title,
                    'seo_description' => $blog->seo_description,
                    'seo_tags' => $blog->seo_tags,
                    'slug' => $blog->slug,
                    'created_at' => $blog->created_at->toDateTimeString(),
                ];
            });

        return response()->json($blogs);
        
    }

}
