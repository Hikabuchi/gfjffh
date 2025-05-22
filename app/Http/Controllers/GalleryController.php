<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class GalleryController extends Controller
{
    public function index() {
        $applications = Application::where('status_id', '3')->get();
        return view('index', ['applications' => $applications]);
    }
}