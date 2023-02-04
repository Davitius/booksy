<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleeditController extends Controller
{
    public function edit($id)
    {
        $Roles = DB::table('roles')->where('id', $id)->get();
        $Categories = DB::table('categories')->get();

        return view('AdminPanel.Categories.editservice', compact('Roles', 'Categories'));
    }

    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $service = $request->input('service');
        $role = $request->input('role');
        $data['service'] = $service;
        $data['role'] = $role;
        $roles->update($data);

        return redirect()->route('AdminPanel.Categories');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('AdminPanel.Categories');
    }
}
