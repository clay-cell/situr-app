<?php

namespace App\Http\Controllers;

use App\Models\solicitud_usuario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CredencialesUsuario;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.mostrar_usuarios');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::select('*')
            ->whereNot('name', 'Contribuyente')
            ->get();;
        return view('users.registrar_usuario', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $request->validate([

                'cite' => 'required|string|max:255',
                'nombres' => 'required|string|max:255',
                'primer_apellido' => 'nullable|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'cedula' => 'required|string|max:20|unique:users,cedula,',
                'extension' => 'required|string',
                'nacionalidad' => 'required|string|max:100',
                'direccion' => 'required|string|max:255',
                'ciudad' => 'required|string|max:100',
                'telefono' => 'required|string|max:20|unique:users,telefono,',
                'celular' => 'required|string|max:20|unique:users,celular,',
                'lugar_nacimiento' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required|string|in:V,M',
                'foto' => 'image|mimes:jpeg,png,jpg|max:3072',
                'rol' => 'required',
            ]);
            $user = new User();
            $user->name = ucwords(strtolower($request->nombres));
            $user->primer_apellido = ucwords(strtolower($request->primer_apellido));
            $user->segundo_apellido = ucwords(strtolower($request->segundo_apellido));
            $user->nacionalidad = strtoupper($request->nacionalidad);
            $user->cedula = $request->cedula;
            $user->extension = strtoupper($request->extension);
            $user->direccion = strtoupper($request->direccion);
            $user->ciudad = strtoupper($request->ciudad);
            $user->email = $request->email;
            $user->password = Hash::make($request->cedula);
            $user->telefono = $request->telefono;
            $user->celular = $request->celular;
            $user->lugar_nacimiento = strtoupper($request->lugar_nacimiento);
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->estado = true;  //;ambia el estado a activo
            $user->sexo = $request->sexo;
            //$user->profile_photo_path = $request->foto;
            // Handle photo upload if provided
            if ($request->hasFile('foto')) {
                $imagen = $request->file('foto');
                $filename = $request->cedula . '.' . $imagen->getClientOriginalExtension();
                $destination = public_path('perfiles');
                $imagen->move($destination, $filename);
                $user->profile_photo_path = 'perfiles/' . $filename;
            } else {
                $user->profile_photo_path = null;
            }
            $user->save();
            // Asignar el rol al usuario
            $user->assignRole($request->rol); // Usando el método assignRole
            return redirect()->route('users.index')->with('success', '$dato_solicitud');

        } catch (ValidationException $e) {
            // return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }
    public function registrar_contribuyentes(Request $request)
    {
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
            DB::transaction(function () use ($request) {
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
                $solicitud->estado = true;

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
                //return redirect()->route('login')->with('success', 'Su Solicitud fue procesada con Exito'); // Redirección en caso de éxito
                $dato_solicitud = solicitud_usuario::where('cedula', $request->cedula)->first();
                $user = new User();
                $user->name = ucwords(strtolower($request->nombre));
                $user->primer_apellido = ucwords(strtolower($request->primer_apellido));
                $user->segundo_apellido = ucwords(strtolower($request->segundo_apellido));
                $user->nacionalidad = strtoupper($request->nacionalidad);
                $user->cedula = $request->cedula;
                $user->extension = strtoupper($request->extension);
                $user->direccion = strtoupper($request->direccion);
                $user->ciudad = strtoupper($request->ciudad);
                $user->email = $request->email;
                $user->password = Hash::make($request->cedula);
                $user->telefono = $request->telefono;
                $user->celular = $request->celular;
                $user->lugar_nacimiento = strtoupper($request->lugar_nacimiento);
                $user->fecha_nacimiento = $request->fecha_nacimiento;
                $user->estado = true;  //;ambia el estado a activo
                $user->sexo = $request->sexo;
                $user->profile_photo_path = $dato_solicitud->foto;
                // Asigna el rol 'rol_2' al nuevo usuario
                $user->assignRole('Contribuyente');
                $user->save();
                // Enviar correo con la contraseña
                Mail::to($user->email)->send(new CredencialesUsuario($user, $request->cedula));
            });
            //return redirect()->back()->with('success', 'Usuario aprobado y notificado.');
            return redirect()->route('users.index')->with('success', '$dato_solicitud');
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users = User::find($id);
        if (!$users) {
            return view('error404');
        }
        //return $users;
        return view('users.actualizar_usuarios', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //code...
            // Validación de los datos de entrada
            $request->validate([
                'nombres' => 'required|string|max:255',
                'primer_apellido' => 'nullable|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'cedula' => 'required|string|max:20|unique:users,cedula,' . $id,
                'extension' => 'required|string',
                'nacionalidad' => 'required|string|max:100',
                'direccion' => 'required|string|max:255',
                'ciudad' => 'required|string|max:100',
                'telefono' => 'required|string|max:20|unique:users,telefono,' . $id,
                'celular' => 'required|string|max:20|unique:users,celular,' . $id,
                'lugar_nacimiento' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required|string|in:V,M',
            ]);
            // Obtener el usuario por ID
            $user = User::find($id);
            if (!$user) {
                return view('error404');
            }
            // Actualizar la información del usuario
            $user->name = ucwords(strtolower($request->nombres));
            $user->primer_apellido = ucwords(strtolower($request->primer_apellido));
            $user->segundo_apellido = ucwords(strtolower($request->segundo_apellido));
            $user->cedula = $request->cedula;
            $user->extension = $request->extension;
            $user->nacionalidad = strtoupper($request->nacionalidad);
            $user->direccion = strtoupper($request->direccion);
            $user->ciudad = $request->ciudad;
            $user->telefono = $request->telefono;
            $user->celular = $request->celular;
            $user->lugar_nacimiento = $request->lugar_nacimiento;
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->sexo = $request->sexo;
            $user->save();
            // Redirigir con mensaje de éxito
            return redirect()->route('users.index')->with('success', 'Información del usuario actualizada con éxito.');
        } catch (ValidationException $e) {
            return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function estado($id, $state)
    {
        //
        //return $id . $state;
        DB::table('users')
            ->where('id', $id)
            ->update(['estado' => $state]);

        $message = ($state == 1) ? 'Usuario activado correctamente' : 'Usuario desactivado correctamente';
        return redirect()->route('users.index')->with('success', $message);
    }
    /*************EDICION DE PERFIL********************* */
    public function perfil(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('users.perfil_usuario',compact('user'));
    }
    public function update_profile(Request $request ,$id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres' => 'required|string|max:255',
            'primer_apellido' => 'nullable|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'nacionalidad' => 'nullable|string|max:255',
            'cedula' => 'nullable|string|max:20',
            'extension' => 'nullable|string|max:5',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'celular' => 'nullable|string|max:15',
            'password' => 'nullable|confirmed|min:8',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Para la foto de perfil
        ]);

        $user = User::find($id);

        // Actualizar los datos básicos
        $user->name = $request->nombres;
        $user->primer_apellido = $request->primer_apellido;
        $user->segundo_apellido = $request->segundo_apellido;
        $user->nacionalidad = $request->nacionalidad;
        $user->cedula = $request->cedula;
        $user->extension = $request->extension;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->celular = $request->celular;

        // Actualizar la contraseña si se proporciona
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        // Procesar la imagen de perfil si se sube una nueva
        if ($request->hasFile('profile_photo')) {
            // Borrar la foto de perfil anterior si existe
            if ($user->profile_photo_path) {
                $oldPath = public_path($user->profile_photo_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath); // Eliminar el archivo anterior
                }
            }

            // Guardar la nueva foto de perfil en 'public/profile_photos'
            $file = $request->file('profile_photo');
            $filename = $request->cedula . '_' . $file->getClientOriginalName(); // Nombre único para evitar conflictos
            $file->move(public_path('profile_photos'), $filename);

            // Guardar la ruta relativa en la base de datos para acceder a la imagen desde el frontend
            $user->profile_photo_path = 'profile_photos/' . $filename;
        }
        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir o devolver una respuesta
        return redirect()->back()->with('success', 'Perfil actualizado exitosamente.');
    }
}
