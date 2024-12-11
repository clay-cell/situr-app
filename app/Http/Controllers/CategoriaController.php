<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('tipoServicio')->get(); // Traer categorías con su tipo de servicio relacionado
        return view('categorias.index', compact('categorias'));
    }
    public function todo_categoria(){
        return view('categorias.mostrar_categorias');
    }
}
