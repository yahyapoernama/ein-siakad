<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['titlePage'] = 'Home';

        return view('admin.dashboard', $data);
    }
}
