<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $servicios = [
            'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO' => 1,
            'EMPRESAS DE VIAJES Y TURISMO' => 2,
            'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO' => 3,
            'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO' => 4,
            'GUIAS DE TURISMO' => 5,
            'SERVICIOS GASTRONOMICOS TURISTICOS' => 6,
        ];
        $tiposSanciones = [
            'INFRACCION LEVE' => 1,
            'INFRACCION GRAVE' => 2,
            'INFRACCION MUY GRAVE' => 3,
        ];
        $item_sancion = [
            /*********HOSPEDAJE******* */
            //LEVES
            /*a)*/
            ['nombre_sancion' => 'No exponer en las habitaciones y la recepcion del Establecimiento de Hospedaje Turistico las condiciones de uso para el huesped', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*b)*/
            ['nombre_sancion' => 'La omision de señalizacion en pasillo, ingresos,salidas,habitaciones y baños', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*c)*/
            ['nombre_sancion' => 'El no pago de la Tasa Adminsitrativa de Regulacion Turistica durante el periodo efectivo.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*d)*/
            ['nombre_sancion' => 'La incorrecta consignacion de datos del o los huespedes en el sistema de registros de la Empresa de Servicios de Hospedaje Turistico', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*e)*/
            ['nombre_sancion' => 'La incorrecta consignacion de datos en el registro de movimiento de huespedes en los partes diarios a ser remitidos a las instanciaas correspondientes mediane plataforma informatica u otros medios', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*f)*/
            ['nombre_sancion' => 'No contar con libros o sistemas de quejas o sugerencias a disposición de los huéspedes, o la negativa a facilitarlos o no hacerlo en el momento en que se soliciten. No se registra ni se da seguimiento a las quejas formuladas por los huéspedes o usuarios del servicio.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*g)*/
            ['nombre_sancion' => 'La negativa de facilitar al huesped la documentacion, relativa a los terminos del contrato de hospedaje.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*h)*/
            ['nombre_sancion' => 'Otorgar al huesped informacion que genere expectativas de disfrutar un servicio o instalaciones de categoria o calidad superior a la categoria o clasificacion otorgada por autoridad competente en turismo.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*g)*/
            ['nombre_sancion' => 'No contar con botiquin de primeros auxilios con implementos para curaciones menores (minimamente debera contar con agua oxigeneada, alcohol medicinal,iodo,povidona , venda de gasa de 5cm, venda elastica, compresas de gaza de 5cm, algodon, curitas, tijera, paracetamol de 500 ml, ibuprofeno, antiespasmodico, antiinflamatorio y sales de rehidratacion).', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            //GRAVES
            /*a)*/
            ['nombre_sancion' => 'La utilización comercial o publicitaria de una categoría diferente a la otorgada por la autoridad administrativa correspondiente.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*b)*/
            ['nombre_sancion' => 'La falta de registro y/o la utilización de distintivos que no correspondan a la categoría que le fue otorgada por la autoridad correspondiente.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*c)*/
            ['nombre_sancion' => 'No haber registrado el ingreso, permanencia y salida de los huéspedes en el libro o sistema de registro del Establecimiento de Hospedaje Turístico, incluidos menores.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*d)*/
            ['nombre_sancion' => 'Omitir la consignación de datos de huéspedes, en el parte de movimiento diario de pasajeros, a través de la plataforma informática implementada por la autoridad competente, sobre el ingreso o salida de estos.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*e)*/
            ['nombre_sancion' => 'No ofrecer al huésped, condiciones óptimas de higiene y seguridad del mobiliario y/o equipos en habitaciones y en dependencias del Establecimiento de Hospedaje Turístico.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*f)*/
            ['nombre_sancion' => 'No mantener la infraestructura, inmobiliario y equipamiento de acuerdo a la categoría otorgada por la autoridad competente.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*g)*/
            ['nombre_sancion' => 'El no informa los cambios constitutivos de los Establecimientos de Hospedaje Turístico la denominación o nombre comercial, representante legal, domicilio legal y aquellos cambios trascendentales que deban ser notificadas a la autoridad competente en correspondiente.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*h)*/
            ['nombre_sancion' => 'Brindar u ofertar servicios turísticos, diferentes a la categoría o clasificación que fue otorgada por la autoridad competente.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*i)*/
            ['nombre_sancion' => 'No contar con libro o cualquier otro sistema de registro de huéspedes.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*j)*/
            ['nombre_sancion' => 'La obstrucción del propietario, representante legal o personal de los establecimientos de Hospedaje Turístico en las labores de fiscalización y control desarrolladas por la autoridad administrativa correspondiente.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*k)*/
            ['nombre_sancion' => 'El cobro de tarifas superiores a las pactadas con los huéspedes.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*l)*/
            ['nombre_sancion' => 'La reincidencia en la comisión de dos infracción leves, la hace merecedora de una infracción grave.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            //MUY GRAVES
            /*A)*/
            ['nombre_sancion' => 'En la prestación del servicio la comisión de una acción que dañe el prestigio del país y/o de la actividad turística nacional.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B)*/
            ['nombre_sancion' => 'Por haber incurrido, en el transcurso de la gestión, en la comisión de dos (2) infracciones graves, debidamente procesadas y con resolución sancionatoria ejecutoriada.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C)*/
            ['nombre_sancion' => 'La falsedad de los datos declarados, en la plataforma informática del SIRETUR, que por su carácter de declaración jurada no puede contener datos falsos.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D)*/
            ['nombre_sancion' => 'Ruptura del precinto de Clausura sin autorización.', 'estado' => true, 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            //GUIAS DE TURISMO
            /*A)*/
            ['nombre_sancion' => 'Carecer de hojas de comentario o formularios de evaluación a disposición de los turistas, la negativa a facilitarlos o no hacerlo en el momento en que se soliciten sin causa justificada. Tales hojas de comentario o formularios deben ser facilitados por la operadora de turismo al guía de turismo.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B)*/
            ['nombre_sancion' => 'La falsedad de datos consignados en la hoja de comentarios o formularios de evaluación, que hubieran sido proporcionados por las agencias u operadoras de turismo que contrataron sus servicios.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C)*/
            ['nombre_sancion' => 'Portar la credencial de guía de turismo desactualizada.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D)*/
            ['nombre_sancion' => 'No informar al pasajero previamente sobre las condiciones del servicio, itinerario y las normas que deben acatar durante el servicio.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*E)*/
            ['nombre_sancion' => 'No portar la credencial de guía de turismo.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            //GRAVE
            /*A)*/
            ['nombre_sancion' => 'Brindar un servicio turístico que implique daño a la imagen turística del país.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B)*/
            ['nombre_sancion' => 'Ser parte de actos de negligencia, discriminación o racismo en la atención de los turistas, o en la atención de reclamos y quejas de turistas.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C)*/
            ['nombre_sancion' => 'El incumplimiento de contrato o de las condiciones pactadas en la orden de servicios, respecto del lugar, tiempo, precio o demás elementos integrantes del servicio acordado, salvo caso fortuito o fuerza mayor debidamente justificada.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D)*/
            ['nombre_sancion' => 'La obstrucción de la labor de control de la instancia correspondiente de turismo en el ejercicio de sus funciones.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*E)*/
            ['nombre_sancion' => 'Falta de veracidad de la información contenida en la Declaración Jurada al momento de la categorización de Guía de turismo.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            //MUY GRAVE
            /*A)*/
            ['nombre_sancion' => 'Dañar los recursos turísticos, lastimar o perturbar a los animales silvestres, dañar el patrimonio cultural material o inmaterial y otros daños que ocasionen perjuicio.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B)*/
            ['nombre_sancion' => 'Promover o participar en el deterioro del patrimonio turístico nacional.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C)*/
            ['nombre_sancion' => 'Ejercer sus funciones o pretender ejercerlas en estado de ebriedad o hacerlo bajo sustancias controladas, estupefacientes, psicotrópicas u otras similares que influyan de manera negativa al correcto desempeño del Guía.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D*/
            ['nombre_sancion' => 'Cobros extras no justificados a los turistas durante el recorrido que no hayan sido anunciados al momento de la adquisición de los servicios.', 'estado' => true, 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            //EMPRESAS DE VIAJES Y TURISMO
            /*A)*/
            ['nombre_sancion' => 'No contar con acceso o sistema de reserva y para la venta, en caso de Agencias de Viajes.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B)*/
            ['nombre_sancion' => 'Prestar servicios turísticos sin haber realizado el pago de la Tasa Administrativa de Regulación Turística, en el periodo efectivo, acorde a la forma y plazo establecido en el Reglamento Específico Tasa Administrativa de Regulación Turística.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C)*/
            ['nombre_sancion' => 'No contar con un sistema o tarjeta de comentarios, la negativa a facilitarlo o no hacerlo al momento que solicite la instancia llamada por Ley, en caso de Operadoras de Turismo.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D)*/
            ['nombre_sancion' => 'El trato irrespetuoso o grosero por parte del personal al turista.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*E)*/
            ['nombre_sancion' => 'No contar con personal capacitado que cuente con conocimientos de las actividades que desarrolla la empresa.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*F)*/
            ['nombre_sancion' => 'No contar con material promocional que lleve la “Marca País”.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION LEVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*GRAVES*/
            /*A)*/
            ['nombre_sancion' => 'La falta de identificación y el no exhibir la Licencia turística otorgada por la Autoridad correspondiente.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B)*/
            ['nombre_sancion' => 'Desarrollar una actividad diferente al registro y categoría con la que se registró y categorizó.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C)*/
            ['nombre_sancion' => 'No informar al cliente o turista las razones de los cambios de itinerario y de servicios ofrecidos, con la anticipación correspondiente.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D)*/
            ['nombre_sancion' => 'La obstrucción del personal dependiente en los operativos de inspección, supervisión y control por autoridad competente o gobiernos autónomos departamentales según corresponda.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*E)*/
            ['nombre_sancion' => 'La contratación de guías que no estén legalmente acreditados por la autoridad correspondiente.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*F)*/
            ['nombre_sancion' => 'No proveer de orden de servicios, hojas de comentarios y lista de pasajeros a los guías de turismo en la prestación de los servicios.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*G)*/
            ['nombre_sancion' => 'No contar con un sistema de comunicaciones que garantice la realización de sus actividades con eficacia y seguridad.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*H)*/
            ['nombre_sancion' => 'No cumplir estrictamente los servicios pactados en el contrato, salvo caso fortuito o de fuerza mayor.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*I)*/
            ['nombre_sancion' => 'Incurrir en el transcurso de una gestión en tres infracciones leves, debidamente procesadas y con resolución sancionatoria ejecutoriada.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*J)*/
            ['nombre_sancion' => 'La reincidencia en la comisión de tres infracciones leves, la hace merecedora de una infracción grave.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            //MUY GRAVE
            /*A*/
            ['nombre_sancion' => 'La reincidencia en la comisión de tres infracciones leves, la hace merecedora de una infracción grave.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*B*/
            ['nombre_sancion' => 'Carecer de póliza o seguros actualizados de acuerdo a la categoría que le corresponda.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*C*/
            ['nombre_sancion' => 'Falta de veracidad de la información contenida en la Declaración Jurada.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*D*/
            ['nombre_sancion' => 'Prestar servicios turísticos sin haber realizado el pago de la Tasa Administrativa de Regulación Turística, en el periodo transitorio, acorde a la forma y plazo establecido en el Reglamento Específico Tasa Administrativa de Regulación Turística.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*E*/
            ['nombre_sancion' => 'El incumplimiento de los requisitos establecidos en los módulos técnicos correspondientes a la categorización obtenida.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*F*/
            ['nombre_sancion' => 'Por haber incurrido, en el transcurso de la gestión, en la comisión de tres (3) infracciones graves, debidamente procesadas y con resolución sancionatoria ejecutoriada.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*G*/
            ['nombre_sancion' => 'Ruptura del precinto de Clausura sin autorización.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            /*H*/
            ['nombre_sancion' => 'Realizar conductas, actos, contratos, convenios o procedimientos combinados cuyo objeto o efecto sea o pueda ser desplazar indebidamente a otros prestadores de servicios turísticos del mercado; impedirles sustancialmente su acceso o establecer ventajas exclusivas en favor de una o varias personas.', 'estado' => true, 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'sancion_id' => $tiposSanciones['INFRACCION MUY GRAVE'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('item_sancions')->insert($item_sancion);
    }
}
