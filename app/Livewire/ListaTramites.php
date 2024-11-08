<?php

namespace App\Livewire;

use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithPagination;

class ListaTramites extends Component
{
    use WithPagination;

    public $mostrar_nregistros = 10;
    public $search;
    public $userId;

    public function mount($user_id)
    {
        $this->userId = $user_id;
    }

    public function render()
    {
        $tramites_realizados = Tramite::select('tramites.id','tramites.fecha_inicio','tramites.estado as tramites_state', 'users.name', 'users.primer_apellido', 'users.segundo_apellido','users.cedula','users.extension','tipo_tramites.nombre_tramite','institucions.nombre')
            ->leftJoin('institucions', 'tramites.institucion_id', 'institucions.id') // Cambia users_id a user_id
            ->leftJoin('users', 'tramites.user_id', 'users.id') // Cambia users_id a user_id
            ->leftJoin('tipo_tramites', 'tramites.tipotramite_id', 'tipo_tramites.id') // Cambia users_id a user_id
            ->where('tramites.user_id', $this->userId) // Cambia users_id a user_id
            ->distinct()
            ->paginate($this->mostrar_nregistros);

        return view('livewire.lista-tramites', [
            'tramites_realizados' => $tramites_realizados,
        ]);
    }
}
