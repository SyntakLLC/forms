<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function show(Property $property) {
        return Inertia::render('Properties/Show', [
            'property' => $property,
            'site' => $property->user->site,
        ]);
    }

    public function edit(Property $property) {
        return Inertia::render('Properties/Edit', [
            'property' => $property,
            'site' => $property->user->site,
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

    public function removePropertyPicture(Request $request) {
        $property = Property::findByUuid($request->property);
        $property->property_photo_url = null;
        $property->save();

        return Redirect::route('property.edit', [
            'property' => $property
        ]);
    }
}
