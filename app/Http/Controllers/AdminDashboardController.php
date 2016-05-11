<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use App\VideoGallery;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoGallery::all();
        $images = ImageGallery::all();
        return view('admin.dashboard', ['images' => $images, 'videos' => $videos]);
    }
}
