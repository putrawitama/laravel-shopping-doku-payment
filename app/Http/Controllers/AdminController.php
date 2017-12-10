<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function getAdmin()
    {
    	return view('admin.page.index');
    }
}
