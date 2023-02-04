<?php

namespace App\Http\Controllers\Job\Events;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientInfoController extends Controller
{
    public function index($id)
    {
        $Client = User::find($id);

        $Bvisits = DB::table('events')->where('barber_id', Auth::user()->id)->where('user_id', $id)->get();
        $CountBvisits = count($Bvisits);

        return view('Job.Events.Clientinfo.index', compact('Client', 'CountBvisits'));
    }
}
