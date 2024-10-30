<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Post;

class AdminBlogCategoryController extends Controller
{
    public function index()
    {
        $blogCategories = BlogCategory::all();
        return view('admin.blog_category.index', compact('blogCategories'));
    }

    public function create()
    {
        return view('admin.blog_category.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:blog_categories',
        ]);

        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->slug = $request->slug;
        $blogCategory->save();

        return redirect()->route('admin_blog_category_index')->with('success', 'Blog Category is Created Successfully');
    }

    public function edit($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit', compact('blogCategory'));
    }

    public function edit_submit(Request $request, $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:blog_categories,slug,' . $id,
        ]);

        $blogCategory->name = $request->name;
        $blogCategory->slug = $request->slug;
        $blogCategory->save();

        return redirect()->route('admin_blog_category_index')->with('success', 'Blog Category is Updated Successfully');
    }

    public function delete($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        if ($blogCategory->posts()->count() > 0) {
            return redirect()->back()->with('error', 'This Blog Category is in use. So you cannot delete it.');
        }

        $blogCategory->delete();
        return redirect()->route('admin_blog_category_index')->with('success', 'Blog Category is Deleted Successfully');
    }
}
