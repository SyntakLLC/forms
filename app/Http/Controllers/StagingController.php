<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\UpdateSiteSlugRequest;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class StagingController extends Controller
{
    public function create(Request $request) {
        return Inertia::render('VirtualStaging/Create', [
        ]);
    }

    public function index(Request $request) {
        return Inertia::render('VirtualStaging/Show', [
        ]);
//        return Inertia::render('VirtualStaging/Index', [
//        ]);
    }
}
