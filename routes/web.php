<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\Establecimientocontroller;
use App\Http\Controllers\ExternosController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PrerequisitoController;
use App\Http\Controllers\Prestadores_servicioController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudesUsuarioController;
use App\Http\Controllers\TipoTramitecontroller;
use App\Http\Controllers\RequisitosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\TramitesController;
use App\Models\Institucion;
use App\Models\Servicio;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    //return view('welcome');
});*/

Route::get('/', [InstitucionController::class, 'index'])->name('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('solicitudes_pendientes', [SolicitudesUsuarioController::class, 'solicitudes_pendientes'])->name('solicitud_usuario.solicitudes_pendientes');
    /***************************************RUTAS SERVICIOS********************************************/
    Route::resource('servicios', ServicioController::class)->names('servicio');

    /***************************************RUTAS TIPO TRAMITES********************************************/
    Route::get('tipo_tramite', [TipoTramitecontroller::class, 'index'])->name('tipo_tramite');
    /******************************RUTAS ROLES**************************************** */
    Route::resource('roles', RolesController::class)->names('roles');
    /******************************RUTAS PERMISOS**************************************** */
    Route::resource('permisos', PermisosController::class)->names('permisos');
    /***************************************RUTAS TIPO REQUISITOS********************************************/
    Route::get('tipo_tramite/requisitos/{id}', [RequisitosController::class, 'index'])->name('requisitos.show');
    /***************************************RUTAS USUARIOS********************************************/
    Route::resource('users', UsersController::class)->names('users');
    Route::get('/users/{id}/estado/{state}', [UsersController::class, 'estado'])->name('users.estado');
    Route::post('/users_contribuyente', [UsersController::class, 'registrar_contribuyentes'])->name('users.registrar_contribuyentes');
    Route::get('profile/user', [UsersController::class, 'perfil'])->name('users.perfil');
    /***************************************RUTAS TIPO PRE REQUISITOS********************************************/
    Route::get('tipo_tramite/pre_requisitos/{id}', [PrerequisitoController::class, 'index'])->name('pre_requisitos.show');

    /***************************************RUTAS INSTITUCION********************************************/
    Route::get('establecimiento', [Establecimientocontroller::class, 'index'])->name('establecimiento.index');
    Route::get('establecimiento/datos', [Establecimientocontroller::class, 'create'])->name('establecimiento.create');
    Route::get('establecimiento/tramites/{id}', [Establecimientocontroller::class, 'show'])->name('establecimiento.show');
    Route::post('establecimiento/registro', [EstablecimientoController::class, 'store'])->name('establecimiento.store');

    /************************************************************RUTAS REPORTES********************************************************/
    Route::get('requisitos/{servicio_id}/{tipo_id}', [ReportesController::class, 'requisitos_tramite'])->name('requisitosTramite');

    /***************************************RUTAS TRAMITES********************************************/
    Route::get('tramite_apertura/{eid}/{tid}', [TramiteController::class, 'create'])->name('tramite.create');
    Route::get('tramite_continua/{eid}/{tid}', [TramiteController::class, 'show'])->name('tramite.show');
    Route::get('tramites/nuevos', [TramiteController::class, 'show_new'])->name('show_new.show');
    Route::get('tramites/en_curso', [TramiteController::class, 'show_process'])->name('show_process.show');
    Route::get('tramites/culminados', [TramiteController::class, 'show_finished'])->name('show_finished.show');
    Route::get('tramites/revision/{eid}/{tid}', [TramiteController::class, 'revisar_tramite'])->name('revisar_tramite.show');
    /************************************************************RUTAS REPORTES********************************************************/
    Route::get('requisitos/{servicio_id}/{tipo_id}', [ReportesController::class, 'requisitos_tramite'])->name('requisitosTramite');
    Route::get('seguimiento/{servicio_id}/{tipo_id}/{tramite_id}', [ReportesController::class, 'seguimiento_tramite'])->name('seguimientoTramite');
    Route::get('formulario/solicitud/{id}', [ReportesController::class, 'formulario_solicitud'])->name('formulario_solicitud');
    Route::get('orden/trabajo/{id}', [ReportesController::class, 'orden_trabajo'])->name('orden_trabajo');
    /*************************PRESTADORES DE SERVICIOS**************************************/
    Route::resource('prestadores_servicios', Prestadores_servicioController::class)->names('prestadores_servicios');
    //subir documentos
    Route::post('subir_documento', [TramiteCOntroller::class, 'subirdoc'])->name('tramites.subirdoc');
    /*******************************************TRAMITES REALIZADOS************************************** */
    Route::get('tramites/realizados/{id}', [TramitesController::class, 'index'])->name('tramites_realizados.index');
    Route::get('documentos/subidos/{id}', [Prestadores_servicioController::class, 'documentos'])->name('documentos_subidos');
    /***************************************RUTAS CLIENTES***************************************************** */
    Route::resource('clientes', ClientesController::class)->names('clientes');
    Route::get('clientes/create/{id}', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('clientes/store/{id}', [ClientesController::class, 'store'])->name('clientes.store');
    /**************************RUTAS PARA USUARIOS EXTERNOS******************************* */
    Route::get('establecimientos/uexternos', [ExternosController::class, 'index'])->name('uestablecimientos.index');
    Route::get('establecimientos/view/establecimientos/{id}', [ExternosController::class, 'establecimientos'])->name('uinstitucion.establecimientos');
    Route::get('establecimientos/cliente/registrados/{id}', [ExternosController::class, 'clientesestablecimeintos'])->name('clientesestablecimeintos');
    /*******************************************TRAMITES REALIZADOS************************************** */
    Route::get('tramites/realizados/{id}', [TramitesController::class, 'index'])->name('tramites_realizados.index');
    Route::get('documentos/subidos/{id}', [Prestadores_servicioController::class, 'documentos'])->name('documentos_subidos');
});
/************************SOLICITUD USUARIOS***************************************/
Route::resource('solicitud_usuarios', SolicitudesUsuarioController::class)->names('solicitud_usuario');
