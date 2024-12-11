<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Licencia;
use App\Models\Notificacion;
use Carbon\Carbon;

class NotificarLicenciasVencimiento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'licencias:notificar';
    protected $description = 'Notifica a instituciones cuyos servicios estén por vencer';
    public function handle()
    {
        $licencias = Licencia::whereDate('fecha_vencimiento', '<=', Carbon::now()->addDays(10))->get();

        foreach ($licencias as $licencia) {
            Notificacion::create([
                'fecha_asignacion' => now(),
                'motivo' => 'Vencimiento de Licencia',
                'mensaje' => "La licencia de la institución {$licencia->institucion->nombre} vence el {$licencia->fecha_vencimiento}.",
                'nuevo' => true,
                'licencia_id' => $licencia->id,
            ]);

        }

        $this->info('Notificaciones generadas exitosamente.');
    }
}
