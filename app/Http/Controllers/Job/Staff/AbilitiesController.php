<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Staff\AbilitiesRequest;
use App\Models\Ability;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbilitiesController extends Controller
{
    public function create(AbilitiesRequest $request, $id)
    {
        $role = Role::find($id);
        $add = DB::table('abilities')->where('service', $role->service)->where('barber_id', Auth::user()->id)->get();
        $Flag = count($add);
        if ($Flag == 0) {
            $data = $request->validated();
            $data['barber_id'] = Auth::user()->id;
            $data['service'] = $role->service;
            $data['allminute'] = 0;

            Ability::Create($data);

            return redirect()->route('Staff');
        }

        return redirect()->route('Staff');
    }


    public function delete($id)
    {
        $del = Ability::find($id);
        $del->delete();

        return redirect()->route('Staff');
    }
}
