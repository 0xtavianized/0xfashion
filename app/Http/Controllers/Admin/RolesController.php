<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RolesModel;
use Illuminate\Support\Str;
class RolesController extends Controller
{
    public function index()
    {
        $roles = RolesModel::all();
        return inertia('Roles/index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return inertia('Roles/create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
        ]);

        // dd($data, Str::slug($data['name']));

        RolesModel::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);

        return redirect()->route('roles')->with('success', 'Role created successfully.');
    }
    public function edit(RolesModel $role)
    {
        return inertia('Roles/edit', [
            'role' => $role
        ]);
    }
    public function update(Request $request, RolesModel $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id],
        ]);

        $role->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);

        return redirect()->route('roles')->with('success', 'Role updated successfully.');
    }
}
