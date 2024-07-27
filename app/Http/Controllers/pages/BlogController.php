<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\AddBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogdata = AddBlog::all();
       
        foreach ($blogdata as $blog) {
            $file = $blog->getMedia('image')->last();
            if ($file) {
                $blog->imageUrl = $file->getUrl(); // Add the URL of the image to the blog instance
            } else {
                $blog->imageUrl = null; // Set a default value if there's no image
            }
        }

        return view('pages.blog.index', compact('blogdata'));
        
    }
    public function show($slug)
    {
        $record = AddBlog::where('slug', $slug)->first();
        
        if ($record) {
            $file = $record->getMedia('image')->last();
            
            if ($file) {
                $record->imageUrl = $file->getUrl(); // Add the URL of the image to the record instance
                
            } else {
                $record->imageUrl = null; // Set a default value if there's no image
            }
        }
        $allblog = AddBlog::all();
        foreach ($allblog as $blogImage) {
            $file = $blogImage->getMedia('image')->last();
            if ($file) {
                $blogImage->imageUrl = $file->getUrl(); // Add the URL of the image to the blog instance
            } else {
                $blogImage->imageUrl = null; // Set a default value if there's no image
            }
        }

        return view('pages.blog.show', compact('record','allblog'));
    }
}
