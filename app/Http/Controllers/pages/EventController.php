<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\AddEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = AddEvent::all();
        foreach ($events as $event) {
            $file = $event->getMedia('image')->last();
            if ($file) {
                $event->imageUrl = $file->getUrl(); // Add the URL of the image to the blog instance
            } else {
                $event->imageUrl = null; // Set a default value if there's no image
            }
        }
       return view('pages.events',compact('events'));
    }
}
