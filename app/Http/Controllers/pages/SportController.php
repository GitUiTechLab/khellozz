<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\AddSport;
use Illuminate\Http\Request;

class SportController extends Controller
{
   public function index()
    {
        $sports = AddSport::all();
        foreach ($sports as $sport) {
            $file = $sport->getMedia('image')->last();
            if ($file) {
                $sport->imageUrl = $file->getUrl(); // Add the URL of the image to the sport instance
            } else {
                $sport->imageUrl = null; // Set a default value if there's no image
            }
        }
        return view('pages.sport.sports',compact('sports'));
    }

     public function show($slug)
     {
        $record = AddSport::where('slug', $slug)->first();
        if ($record) {
            $file = $record->getMedia('image')->last();
            
            if ($file) {
                $record->imageUrl = $file->getUrl(); // Add the URL of the image to the record instance
                
            } else {
                $record->imageUrl = null; // Set a default value if there's no image
            }
        }
         return view('pages.sport.sport-detail',compact('record'));
     }


}
