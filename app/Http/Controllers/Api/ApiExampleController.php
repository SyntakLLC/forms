<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiExampleController extends Controller
{
    public function get() {
        return response(['success' => true]);
    }
}
