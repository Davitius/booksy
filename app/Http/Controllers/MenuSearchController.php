<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuSearchController extends Controller
{
    public function search(Request $request)
    {
        $city = $request->input('location');
        $MenuSearch = $request->input('MenuSearch');

        $search = Salon::where('service', 'LIKE', "%{$MenuSearch}%")->where('location', $city)->orderBy('id', 'DESC')->paginate(16);

        return view('/MenuSearch', compact('search', 'MenuSearch', 'city'));
    }
}
