<?php

namespace App\Livewire;

use App\Models\Licencia;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Notificaciones extends Component
{
    public $notificaciones;
    public $modalVisible = false; // Controla la visibilidad del modal
    public $licencia_id;

    public function mount()
    {
        $this->cargarNotificaciones();
        //dd($this->licencia_id); // Muestra el valor que se pasa desde Blade
    }

    public function cargarNotificaciones()
    {
        //$licencia = Auth::user()->institucion->licencias->first(); // obtiene la primera licencia
        /*$licencia = Licencia::join('institucions', 'licencias.institucion_id', '=', 'institucions.id')
            ->join('users', 'institucions.user_id',  'users.id')
            ->where('users.id', Auth::id())
            ->where('licencias.id', $licencia_id)
            ->select('licencias.*')
            ->first();*/
            //dd($this->licencia_id);
        $licencia = Licencia::join('institucions', 'licencias.institucion_id', '=', 'institucions.id')
            ->join('users', 'institucions.user_id', '=', 'users.id')
            ->where('users.id', Auth::id())
            ->where('licencias.id', $this->licencia_id)
            ->select('licencias.*')
            ->first();


        $licenciaId = $licencia ? $licencia->id : null;
        //dd($licencia);


        if ($licenciaId) {
            $this->notificaciones = Notificacion::where('licencia_id', $licenciaId)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->notificaciones = collect([]);
        }
    }

    public function mostrarModal()
    {
        $this->modalVisible = true;
    }

    public function cerrarModal()
    {
        $this->modalVisible = false;
    }

    public function marcarComoLeido()
    {
        if ($this->notificaciones) {
            foreach ($this->notificaciones as $notificacion) {
                if ($notificacion->nuevo) {
                    $notificacion->nuevo = false;
                    $notificacion->save();
                }
            }
        }

        $this->cargarNotificaciones();
        $this->cerrarModal();
    }

    public function render()
    {
        return view('livewire.notificaciones');
    }
}
