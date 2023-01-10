<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Feedback;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index($id)
    {
        $barber = User::find($id);
        $salon = Salon::find($barber['sal_id']);
        $abilities = DB::table('abilities')->orderBy('service')->where('barber_id', $id)->get();
        $feedbacks = DB::table('feedback')->where('barber_id', $id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
        if (Auth::user()) {
            $check = DB::table('feedback')->where('barber_id', $id)->where('user_id', Auth::user()->id)->where('status', 'Active')->get();

        } else {
            $check = [''];
        }
        $Five = DB::table('feedback')->where('status', 'Active')->where('star', '5')->where('barber_id', $id)->get();
        $Four = DB::table('feedback')->where('status', 'Active')->where('star', '4')->where('barber_id', $id)->get();
        $Three = DB::table('feedback')->where('status', 'Active')->where('star', '3')->where('barber_id', $id)->get();
        $Two = DB::table('feedback')->where('status', 'Active')->where('star', '2')->where('barber_id', $id)->get();
        $One = DB::table('feedback')->where('status', 'Active')->where('star', '1')->where('barber_id', $id)->get();

        $Fives = count($Five);
        $Fours = count($Four);
        $Threes = count($Three);
        $Twos = count($Two);
        $Ones = count($One);

        if ($Fives == '' && $Fours == '' && $Threes == '' && $Twos == '' && $Ones == '') {

            $Stats = ['Ones' => 0, 'Twos' => 0, 'Threes' => 0, 'Fours' => 0, 'Fives' => 0, 'Sul' => 0, 'Rating' => 0,
                'PercentFive' => 0, 'PercentFour' => 0, 'PercentThree' => 0, 'PercentTwo' => 0, 'PercentOne' => 0];
        } else {
            $Sul = $Fives + $Fours + $Threes + $Twos + $Ones;
            $Jami = ($Fives * 5) + ($Fours * 4) + ($Threes * 3) + ($Twos * 2) + ($Ones);
            $Rating = $Jami / $Sul;
            $Rating = round($Rating, 1);

            $PercentFive = ($Fives / $Sul) * 100;
            $PercentFive = round($PercentFive, 1);
            $PercentFour = ($Fours / $Sul) * 100;
            $PercentFour = round($PercentFour, 1);
            $PercentThree = ($Threes / $Sul) * 100;
            $PercentThree = round($PercentThree, 1);
            $PercentTwo = ($Twos / $Sul) * 100;
            $PercentTwo = round($PercentTwo, 1);
            $PercentOne = ($Ones / $Sul) * 100;
            $PercentOne = round($PercentOne, 1);

            $Stats = ['Ones' => $Ones, 'Twos' => $Twos, 'Threes' => $Threes, 'Fours' => $Fours, 'Fives' => $Fives, 'Sul' => $Sul, 'Rating' => $Rating,
                'PercentFive' => $PercentFive, 'PercentFour' => $PercentFour, 'PercentThree' => $PercentThree, 'PercentTwo' => $PercentTwo, 'PercentOne' => $PercentOne];
        }
        $events = DB::table('events')->where('barber_id', $id)->where('finished', 'falce')->get();
        $N = 1;

        return view('Staff', compact('barber', 'feedbacks', 'Stats', 'check', 'events', 'salon', 'abilities', 'N'));
    }

    public function delete($feedbackid)
    {
        $BarberFeedback = Feedback::find($feedbackid);
        $id = $BarberFeedback['barber_id'];
        $BarberFeedback->delete();

        return redirect()->route('SalonStaff', $id);
    }
}
