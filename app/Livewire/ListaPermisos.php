<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class ListaPermisos extends Component
{
    public $search;
    public $permiso = [
        'id' => null,
        'name' => '',
    ];
    public $modal = null;

    protected $rules = [
        'permiso.name' => 'required|max:80',
    ];
    protected $listeners = ['deleteConfirmed'];

    public function registrar()
    {
        $this->validate();
        Permission::create([
            'name' => $this->permiso['name'],
            'guard_name' => 'web',
        ]);
        $this->reset(['modal', 'permiso']);
        $this->dispatch('confirmacion', 'Se registró correctamente');
    }
    public function render()
    {
        $permisos = Permission::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.lista-permisos', compact('permisos'));
    }
    public function edit($permisoId)
    {
        $permiso = Permission::find($permisoId);
        if ($permiso) {
            $this->permiso = $permiso->toArray();
            $this->modal = 'editar';
        } else {
            session()->flash('error', 'Permiso no encontrado.');
        }
    }

    public function actualizar()
    {
        $this->validate();

        $permiso = Permission::find($this->permiso['id']);
        if ($permiso) {
            $permiso->update([
                'name' => $this->permiso['name'],
            ]);
            $this->reset(['modal', 'permiso']);
            $this->dispatch('confirmacion', 'Se actualizó correctamente');
        } else {
            session()->flash('error', 'Permiso no encontrado para actualizar.');
        }
    }

    public function deleteConfirmed($permisoId) // Single parameter only
    {
        $permiso = Permission::find($permisoId);
        if ($permiso) {
            $permiso->delete();
            $this->dispatch('confirmacion', 'Se eliminó correctamente');
        } else {
            session()->flash('error', 'Permiso no encontrado para eliminar.');
        }
    }
}
