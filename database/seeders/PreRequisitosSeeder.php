<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PreRequisitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $prerequisito = [
        ['grupo' => 'REQUISITOS ADMINISTRATIVOS','descripcion' => 'Carta solicitando "Licencia Turística Departamental" Dirigida al Gobernador del Gobierno autónomo Departamental de Cochabamba HUMBERTO SANCHEZ SANCHEZ https://docs.google.com/document/d/1S-HLRUbn-7qrT5k5o6lONF9iVtatlBhN/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['grupo' => 'REQUISITOS ADMINISTRATIVOS','descripcion' => 'Cedula de identidad del propietario y/o representante legal, vigente (Fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'Testimonio de constitución de sociedad, en caso de S.R.L., S.A., LTDA y otros. (SOLO EN CASO DE SOCIEDAD) (fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'Poder del Representante Legal (SOLO EN CASO DE SOCIEDAD); (fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'Registro de Comercio - SEPREC Vigente (Fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'Licencia de Funcionamiento Municipal vigente del municipio correspondiente (Fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'Certificado de inscripción en el Padrón Nacional de Contribuyentes - Servicio de Impuestos Nacionales (Fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'NIT (Fotocopia)', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['grupo' => 'REQUISITOS LEGALES','descripcion' => 'Balance General de Apertura o de la última gestión, según corresponda.', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS EESPECIFICOS Y TECNICOS','descripcion' => 'Documento técnico de Categorización Realizado Por Un Profesional En Turismo ó Módulo de Categorización llenado conforme a su establecimiento, firmado por el propietario y/o representante legal. Link de descarga de los Módulos de Categorización: https://drive.google.com/drive/folders/1PGY3WHSunQAPZwxu4VdC6AsT8R-ql7fA?usp=sharing', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS EESPECIFICOS Y TECNICOS','descripcion' => 'Adjuntar Hojas de vida documentada del personal fijo de acuerdo al organigrama de la empresa.', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'REQUISITOS EESPECIFICOS Y TECNICOS','descripcion' => 'Formulario de Datos para Notificación y Contacto.Link de descarga del documento modelo: https://docs.google.com/document/d/1DNqsEVGamPZcxC9nT1F9zUo5aMh_Vz7k/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
        ['grupo' => 'SIRETUR','descripcion' => 'Inscripción al sistema nacional de Registro, Categorización y Certificación de Prestadores de Servicios Turísticos - SIRETUR.Link de ingreso al sistema SIRETUR: https://siretur.produccion.gob.bo/auth/login ', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
      ];
      DB::table('pre_requisitos')->insert($prerequisito);
    }
}
