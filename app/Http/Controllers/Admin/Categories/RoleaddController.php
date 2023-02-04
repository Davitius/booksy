<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleaddRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleaddController extends Controller
{
    public function create(RoleaddRequest $request)
    {
        $data = $request->validated();
        Role::Create($data);

        return redirect()->route('AdminPanel.Categories');
    }
}
