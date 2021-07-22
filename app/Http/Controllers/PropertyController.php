<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Photo;
use App\Models\Property;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function updateMatterport(Request $request) {
        $property = Property::findByUuid($request->property);
        $property->video_url = $request->video;
        $property->matterport_url = $request->matterport;
        $property->save();

        return Redirect::route('property.edit', $request->property);
    }

    public function show(Property $property) {
        return Inertia::render('Properties/Show', [
            'property' => $property,
            'onTrial' => $property->user->onTrial(),
            'subscribed' => $property->user->subscribed(),
            'site' => $property->user->site,
            'photos' => $property->photos,
        ]);
    }

    public function edit(Property $property) {
        return Inertia::render('Properties/Edit', [
            'property' => $property,
            'site' => $property->user->site,
            'photos' => $property->photos,
        ]);
    }

    public function create(Request $request) {
        $property = Property::create([
            'town_and_state' => 'Boston, MA',
            'street_address' => '123 Main Street',
            'bed' => 3,
            'bath' => 2,
            'square_feet' => 2000,
            'description' => '',
            'user_id' => Auth::user()->id,
            'site_id' => Auth::user()->site->id,
            'photo_url' => 'nul',
            'property_photo_url' => 'property-photos/Default-Property-Photo.jpg',
        ]);

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }

    public function updatePropertyPicture(Request $request) {
        $filepath = 'property-photos/' . $request->uuid . '.' . $request->extension;
        Storage::move($request->key, $filepath);

        $property = Property::findByUuid($request->property);
        $property->property_photo_url = $filepath;
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }

    public function addPropertyPicture(Request $request) {
        $filepath = 'listing-photos/' . $request->uuid . '.' . $request->extension;
        Storage::move($request->key, $filepath);

        $property = Property::findByUuid($request->property);
//        $property->property_photo_url = $filepath;
//        $property->save();

        $photo = Photo::create([
            'property_id' => $property->id,
            'photo_url' => $filepath,
        ]);

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }

    public function removePropertyPicture(Request $request) {
        $property = Property::findByUuid($request->property);
        $property->property_photo_url = null;
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }

    public function updateTownAndState(Request $request) {
        $property = Property::findByUuid($request->get('property'));
        $property->town_and_state = $request->get('text');
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }
    public function updateStreetAddress(Request $request) {
        $property = Property::findByUuid($request->get('property'));
        $property->street_address = $request->get('text');
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }
    public function updateBed(Request $request) {
        $property = Property::findByUuid($request->get('property'));
        $property->bed = $request->get('text');
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }
    public function updateBath(Request $request) {
        $property = Property::findByUuid($request->get('property'));
        $property->bath = $request->get('text');
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }
    public function updateSquareFeet(Request $request) {
        $property = Property::findByUuid($request->get('property'));
        $property->square_feet = $request->get('text');
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }
    public function updateDescription(Request $request) {
        $property = Property::findByUuid($request->get('property'));
        $property->description = $request->get('text');
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }

    public function destroy(Request $request) {
        $property = Property::findByUuid($request->get('property_uuid'));
        $property->delete();

        return Redirect::route('dashboard');
    }
}
