<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\RolesEnum;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $role = Role::where('name', $request->type)->first();
        $users = User::where('name', 'LIKE', '%' . request('query') . '%')
            ->whereHas('roles', function ($query) use ($role) {
            $query->where('role_id', $role->id);
        })->get();
        return customResponse($users, '', 200);
    }
}
