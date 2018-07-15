<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Placetype;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{

    public function placeList()
    {
        $places = Place::All()->all();
        $placetypes = Placetype::All()->all();
        $types = [];

        foreach ($placetypes as $pt)
            $types[$pt->id] = $pt->name;

        return view('placelist', compact('places', 'types'));
    }

    public function addPlace()
    {
        $types = Placetype::all();

        return view('addplace', compact('types'));
    }

    public function doAddPlace(Request $request)
    {
        $newplace = $request->only('name', 'placetype_id');
        Place::create($newplace);

        return redirect('/places');
    }

    public function showPlace($id)
    {
        $name = urldecode($id);
        $place = Place::place($name)->first();
        $pictures = Picture::pictures($place->id)->get();

        return view('showplace', compact('place', 'pictures'));
    }

    public function addPhoto(Request $request, $id)
    {
        $referer = $request->server('HTTP_REFERER');
        $name = urldecode($id);
        $place = Place::place($name)->first();
        $places = Place::All()->all();

        return view('addphoto', compact('places', 'place', 'referer'));
    }

    public function doAddPhoto(Request $request)
    {
        $file = $request->file('image');
        //$location = $file->store('collection', 'public');
        $path = $file->storeAs('collection', $file->getClientOriginalName(), 'public');
        list($width, $height) = getimagesize(storage_path('app/public')."/{$path}");

        $location = Storage::url($path);

        $place_id = intval($request->input('place_id'));
        $place = Place::placeById($place_id)->first();

        Picture::create(['place_id' => $place->id, 'location' => $location, 'width' => $width, 'height' => $height]);

        return redirect("places/{$place->name}/");
    }
}

