<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {

        $BestUsers = DB::table('users')->where('status', 'Active')->where('rating', '>=', 3)->get();

        return view('index', compact('BestUsers'));
    }

}
