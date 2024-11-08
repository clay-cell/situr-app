<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('roles.mostrar_roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permisos = Permission::all();
        return view('roles.registrar_rol', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:191|unique:roles,name',
        ]);
        //$roles=Role::create($request->only('name'));
        $roles = Role::create($request->all());
        $roles->permissions()->sync($request->permisos);
        return redirect()->route('roles_red.index')->with('registrado', 'si');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $permisos = Permission::all();
        $roles = Role::find($id);
        $permisos_roles = [];
        foreach ($roles->permissions as $asignado) {
            $permisos_roles[] = $asignado->id;
        }
        //return $permisos;
        return view('roles.actualizar_rol', compact('roles', 'permisos', 'permisos_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $roles = Role::find($id);
        $request->validate([
            'name' => "required|max:191|unique:roles,name,$roles->id",
        ]);
        //$roles->update($request->only('name'));
        $roles->update($request->all());
        $roles->permissions()->sync($request->permisos);
        return redirect()->route('roles.index')->with('actualizado', 'si');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
