<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class ListaCategorias extends Component
{
    public $visualizar = false;
    public $visualiza_actualizar = false;
    public $mostrar_nregistros = 10;
    use WithPagination;
    public $nombre_categoria = '';
    public $descripcion = '';
    public $id;

    public function mostrar()
    {
        $this->visualizar = true;
    }
    public function ocultar()
    {
        $this->visualizar = false;
    }
    public function registrar(){
        $this->validate([
          'nombre_servicio' => 'required|string',
          'descripcion' => 'required|string',
        ]);
        Categoria::create([
          "nombre"=>mb_strtoupper($this->nombre_categoria, 'UTF-8'),
          "descripcion"=>mb_strtoupper($this->nombre_servicio, 'UTF-8')
        ]);
        $this->nombre_categoria="";
        $this->descripcion="";
        $this->visualizar=false;
      }
    public function mostrar_actualizar()
    {
        $this->visualiza_actualizar = true;
    }
    public function ocultar_actualizar()
    {
        $this->visualiza_actualizar = false;
    }
    public function recupera($id){
        $this->id=$id;
        $servicio=Categoria::find($id);
        $this->nombre_categoria=$servicio->tipo_servicio;
        $this->descripcion=$servicio->tipo_servicio;
        $this->visualiza_actualizar=true;
      }
      public function actualizar(){
        $servicio=Categoria::find($this->id);
        $this->validate([
          'nombre_categoria' => 'required|string|min:5|max:100',
        ]);
        $servicio->nombre_categoria=mb_strtoupper($this->nombre_categoria, 'UTF-8');
        $servicio->descripcion=mb_strtoupper($this->descripcion, 'UTF-8');
        $servicio->save();
        $this->visualiza_actualizar=false;
        $this->nombre_categoria="";
        $this->descripcion="";
      }
    public function render()
    {
        $categorias = Categoria::select('*')->paginate($this->mostrar_nregistros);
        return view('livewire.lista-categorias', compact('categorias'));
    }
}
