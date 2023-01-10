<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\SalonCreateRequest;
use App\Http\Requests\Job\SalonUpdateRequest;
use App\Http\Requests\Job\StaffAddRequest;
use App\Http\Requests\Job\StaffSearchRequest;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Salon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BeautysalonController extends Controller
{
    public function index()
    {
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        if (isset($salon)) {
            $staffs = DB::table('users')->where('sal_id', $salon->id)->orderBy('saladdtime', 'DESC')->paginate(10);
            return view('Job.Beautysalon', compact('salon', 'staffs'));
        }

        return view('Job.Beautysalon', compact('salon'));
    }


    public function search(StaffSearchRequest $request)
    {
        $search = $request->validated();
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $staffs = DB::table('users')->where('sal_id', $salon->id)->orderBy('id')->paginate(10);
        $s_staffs = DB::table('users')->where('staffcode', $search['staffcode'])->get();

        return view('Job.Beautysalon', compact('salon', 'staffs', 's_staffs'));
    }


    public function create(SalonCreateRequest $request)
    {
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();

        if (isset($salon)) {
            return redirect()->route('Job.Beautysalon');
        } else {
            $data = $request->validated();
            if ($request->file('photo') != '') {
                $data['photo'] = Storage::disk('public')->put('Salons', $request->file('photo'));
            }

            $wd = $request->input('monday') . '   ' . $request->input('tuesday') . '   ' . $request->input('wednesday') . '   ' . $request->input('thursday') . '   ' . $request->input('friday') . '   ' . $request->input('saturday') . '   ' . $request->input('sunday');
            $data['work_d'] = $wd;
            $Service = $request->input('11') . ' ' . $request->input('12') . ' ' . $request->input('13') . ' ' . $request->input('14') . ' ' . $request->input('15') . ' ' . $request->input('16') . ' ' . $request->input('17') . ' ' . $request->input('18') . ' ' . $request->input('19') . ' ' . $request->input('20') . ' ' . $request->input('21') . ' ' . $request->input('22');
            $data['service'] = $Service;
            $data['user_id'] = Auth::user()->id;
            $data['location'] = $request->input('location');

            Salon::Create($data);

            return redirect()->route('Job.Beautysalon');
        }
    }


    public function update(SalonUpdateRequest $request)
    {
        $data = $request->validated();
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $salonarry = Salon::find($salon->id);

        if ($request->file('photo') != '') {
            $AvatarFileName = $salon->photo;
            if (Storage::disk('public')->exists($AvatarFileName)) {
                Storage::disk('public')->delete($AvatarFileName);
            }
            $data['photo'] = Storage::disk('public')->put('Salons', $request->file('photo'));
        }
        $wd = $request->input('monday') . '   ' . $request->input('tuesday') . '   ' . $request->input('wednesday') . '   ' . $request->input('thursday') . '   ' . $request->input('friday') . '   ' . $request->input('saturday') . '   ' . $request->input('sunday');
        $data['work_d'] = $wd;
        $Service = $request->input('11') . ' ' . $request->input('12') . ' ' . $request->input('13') . ' ' . $request->input('14') . ' ' . $request->input('15') . ' ' . $request->input('16') . ' ' . $request->input('17') . ' ' . $request->input('18') . ' ' . $request->input('19') . ' ' . $request->input('20') . ' ' . $request->input('21') . ' ' . $request->input('22');
        $data['service'] = $Service;
        $data['user_id'] = Auth::user()->id;
        $data['location'] = $request->input('location');

        $salonarry->update($data);

        return redirect()->route('Job.Beautysalon', compact('salon'));
    }


    public function delete()
    {
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $salonarry = Salon::find($salon->id);
        $AvatarFileName = $salon->photo;
        if (Storage::disk('public')->exists($AvatarFileName)) {
            Storage::disk('public')->delete($AvatarFileName);
        }

        $salonarry->delete();

        $user = User::find(Auth::user()->id);
        $data['sal_id'] = null;
        $user->update($data);

        return redirect()->route('Job.Beautysalon');
    }
}
