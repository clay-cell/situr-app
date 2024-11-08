<?php

namespace App\Http\Controllers;

use App\Models\solicitud_usuario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\CredencialesUsuario;
use Spatie\Permission\Models\Role;

class SolicitudesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('solicitud_usuario');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'primer_apellido' => 'nullable|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'nacionalidad' => 'required|string|max:255',
                'cedula' => 'required|string|max:8',
                'extension' => 'required|string|max:255',
                'direccion' => 'required|string|max:255',
                'ciudad' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:solicitud_usuarios,telefono',
                'telefono' => 'nullable|string|max:8|regex:/^[0-9]{1,8}$/|unique:solicitud_usuarios,telefono',
                'celular' => 'required|string|max:8|regex:/^[0-9]{1,8}$/|unique:solicitud_usuarios,celular',
                'lugar_nacimiento' => 'required|string|max:255',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required|string|in:V,M',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:3072',
                'carta_solicitud' => 'required|file|mimes:pdf',
            ]);

            $solicitud = new solicitud_usuario();
            $solicitud->nombres = ucwords(strtolower($request->nombre));
            $solicitud->primer_apellido = ucwords(strtolower($request->primer_apellido));
            $solicitud->segundo_apellido = ucwords(strtolower($request->segundo_apellido));
            $solicitud->nacionalidad = strtoupper($request->nacionalidad);
            $solicitud->cedula = $request->cedula;
            $solicitud->extension = strtoupper($request->extension);
            $solicitud->direccion = strtoupper($request->direccion);
            $solicitud->ciudad = strtoupper($request->ciudad);
            $solicitud->email = $request->email;
            $solicitud->telefono = $request->telefono;
            $solicitud->celular = $request->celular;
            $solicitud->lugar_nacimiento = strtoupper($request->lugar_nacimiento);
            $solicitud->fecha_nacimiento = $request->fecha_nacimiento;
            $solicitud->sexo = $request->sexo;

            // Handle photo upload if provided
            if ($request->hasFile('foto')) {
                $imagen = $request->file('foto');
                $filename = $request->cedula . '.' . $imagen->getClientOriginalExtension();
                $destination = public_path('perfiles');
                $imagen->move($destination, $filename);
                $solicitud->foto = 'perfiles/' . $filename;
            } else {
                $solicitud->foto = null;
            }

            // Handle carta_solicitud upload if provided
            if ($request->hasFile('carta_solicitud')) {
                $carta = $request->file('carta_solicitud');
                $cartaFilename = 'Carta_Solicitud_' . $request->cedula . '.' . $carta->getClientOriginalExtension();
                $cartaDestination = public_path('cartas_solicitud');
                $carta->move($cartaDestination, $cartaFilename);
                $solicitud->carta_solicitud = 'cartas_solicitud/' . $cartaFilename;
            } else {
                $solicitud->carta_solicitud = null;
            }

            $solicitud->fecha_solicitud = Carbon::now();
            // Save the solicitud
            $solicitud->save();
            return redirect()->route('login')->with('success','Su Solicitud fue procesada con Exito'); // Redirección en caso de éxito

        } catch (ValidationException $e) {
           // return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $solicitud = solicitud_usuario::find($id);
        if(!$solicitud){
            return view('error404');
        }
        $password = $solicitud->cedula;
        //return $solicitud;
        /*$user = User::create([
        'name' => $solicitud->nombres,
        'primer_apellido' => $solicitud->primer_apellido,
        'segundo_apellido' => $solicitud->segundo_apellido,
        'nacionalidad' => $solicitud->nacionalidad,
        'cedula' => $solicitud->cedula,
        'extension' => $solicitud->extension,
        'direccion' => $solicitud->direccion,
        'ciudad' => $solicitud->ciudad,
        'email' => $solicitud->email,
        'password' => Hash::make($solicitud->cedula),
        'telefono' => $solicitud->telefono,
        'celular' => $solicitud->celular,
        'lugar_nacimiento' => $solicitud->lugar_nacimiento,
        'fecha_nacimiento' => $solicitud->fecha_nacimiento,
        'estado' => true,  // Cambia el estado a activo
        'sexo' => $solicitud->sexo,
        'profile_photo_path' => $solicitud->foto,
        ]);*/
        $user = new User();
        $user->name = $solicitud->nombres;
        $user->primer_apellido = $solicitud->primer_apellido;
        $user->segundo_apellido = $solicitud->segundo_apellido;
        $user->nacionalidad = $solicitud->nacionalidad;
        $user->cedula = $solicitud->cedula;
        $user->extension = $solicitud->extension;
        $user->direccion = $solicitud->direccion;
        $user->ciudad = $solicitud->ciudad;
        $user->email = $solicitud->email;
        $user->password =Hash::make($solicitud->cedula);
        $user->telefono = $solicitud->telefono;
        $user->celular = $solicitud->celular;
        $user->lugar_nacimiento = $solicitud->lugar_nacimiento;
        $user->fecha_nacimiento = $solicitud->fecha_nacimiento;
        $user->estado = true;  //;ambia el estado a activo
        $user->sexo = $solicitud->sexo;
        $user->profile_photo_path = $solicitud->foto;
         // Asigna el rol 'rol_2' al nuevo usuario
        $user->assignRole('Contribuyente');
        $user->save();
        // Enviar correo con la contraseña
        Mail::to($user->email)->send(new CredencialesUsuario($user, $password));

        return redirect()->back()->with('success', 'Usuario aprobado y notificado.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*****************************VER USUARIOS PENDIENTES******************************************** */
    public function solicitudes_pendientes(){
        return view('solicitudes.mostrar_solicitudes');
    }
}
