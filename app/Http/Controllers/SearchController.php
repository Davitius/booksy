<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $city = '';
        $Search = $request->input('Search');
        $search = Salon::where('name', 'LIKE', "%{$Search}%")->orderBy('id', 'DESC')->paginate(16);
        
        return view('/Search', compact('search', 'city', 'Search'));
    }
}
