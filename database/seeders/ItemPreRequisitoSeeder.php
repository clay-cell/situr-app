<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemPreRequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item_prerequisitos = [
            ['descripcion' => 'Carta solicitando "Licencia Turística Departamental" Dirigida al Gobernador del Gobierno autónomo Departamental de Cochabamba HUMBERTO SANCHEZ SANCHEZ https://docs.google.com/document/d/1S-HLRUbn-7qrT5k5o6lONF9iVtatlBhN/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Cedula de identidad del propietario y/o representante legal, vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Testimonio de constitución de sociedad, en caso de S.R.L., S.A., LTDA y otros. (SOLO EN CASO DE SOCIEDAD) (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Poder del Representante Legal (SOLO EN CASO DE SOCIEDAD); (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Registro de Comercio - SEPREC Vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Licencia de Funcionamiento Municipal vigente del municipio correspondiente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado de inscripción en el Padrón Nacional de Contribuyentes - Servicio de Impuestos Nacionales (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'NIT (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Balance General de Apertura o de la última gestión, según corresponda.', 'estado' => true, 'pre_requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Documento técnico de Categorización Realizado Por Un Profesional En Turismo ó Módulo de Categorización llenado conforme a su establecimiento, firmado por el propietario y/o representante legal. Link de descarga de los Módulos de Categorización: https://drive.google.com/drive/folders/1PGY3WHSunQAPZwxu4VdC6AsT8R-ql7fA?usp=sharing', 'estado' => true, 'pre_requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Adjuntar Hojas de vida documentada del personal fijo de acuerdo al organigrama de la empresa.', 'estado' => true, 'pre_requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Formulario de Datos para Notificación y Contacto.Link de descarga del documento modelo: https://docs.google.com/document/d/1DNqsEVGamPZcxC9nT1F9zUo5aMh_Vz7k/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Inscripción al sistema nacional de Registro, Categorización y Certificación de Prestadores de Servicios Turísticos - SIRETUR.Link de ingreso al sistema SIRETUR: https://siretur.produccion.gob.bo/auth/login ', 'estado' => true, 'pre_requisito_id' =>  4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            /***************************viajes************************ */
            ['descripcion' => 'Carta solicitando "Licencia Turística Departamental" Dirigida al Gobernador del Gobierno autónomo Departamental de Cochabamba HUMBERTO SANCHEZ SANCHEZ https://docs.google.com/document/d/1maCeB7wxs3qAMxb8dVg7KYIxZytunOEs/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Cedula de identidad del propietario y/o representante legal, vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'Testimonio de constitución de sociedad, en caso de S.R.L., S.A., LTDA y otros. (SOLO EN CASO DE SOCIEDAD) (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Poder del Representante Legal (SOLO EN CASO DE SOCIEDAD); (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Registro de Comercio - SEPREC Vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Licencia de Funcionamiento Municipal vigente del municipio correspondiente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado de inscripción en el Padrón Nacional de Contribuyentes - Servicio de Impuestos Nacionales (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'NIT (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Balance General de Apertura o de la última gestión, según corresponda.', 'estado' => true, 'pre_requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Documento técnico de Categorización Realizado Por Un Profesional En Turismo ó Módulo de Categorización llenado conforme a su establecimiento, firmado por el propietario y/o representante legal. Link de descarga de los Módulos de Categorización: https://drive.google.com/drive/folders/1PGY3WHSunQAPZwxu4VdC6AsT8R-ql7fA?usp=sharing', 'estado' => true, 'pre_requisito_id' =>  7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Adjuntar Hojas de vida documentada del personal fijo de acuerdo al organigrama de la empresa.', 'estado' => true, 'pre_requisito_id' =>  7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Formulario de Datos para Notificación y Contacto.Link de descarga del documento modelo: https://docs.google.com/document/d/1DNqsEVGamPZcxC9nT1F9zUo5aMh_Vz7k/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Inscripción al sistema nacional de Registro, Categorización y Certificación de Prestadores de Servicios Turísticos - SIRETUR.Link de ingreso al sistema SIRETUR: https://siretur.produccion.gob.bo/auth/login ', 'estado' => true, 'pre_requisito_id' =>  8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            /***************************TRANSPORTE TURISTICO EXCLUSIVO************************ */
            ['descripcion' => 'Carta solicitando "Licencia Turística Departamental" Dirigida al Gobernador del Gobierno autónomo Departamental de Cochabamba HUMBERTO SANCHEZ SANCHEZ https://docs.google.com/document/d/1maCeB7wxs3qAMxb8dVg7KYIxZytunOEs/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Cedula de identidad del propietario y/o representante legal, vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'Testimonio de constitución de sociedad, en caso de S.R.L., S.A., LTDA y otros. (SOLO EN CASO DE SOCIEDAD) (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Poder del Representante Legal (SOLO EN CASO DE SOCIEDAD); (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Registro de Comercio - SEPREC Vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Licencia de Funcionamiento Municipal vigente del municipio correspondiente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado de inscripción en el Padrón Nacional de Contribuyentes - Servicio de Impuestos Nacionales (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'NIT (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Balance General de Apertura o de la última gestión, según corresponda.', 'estado' => true, 'pre_requisito_id' =>  10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Documento técnico de Categorización Realizado Por Un Profesional En Turismo ó Módulo de Categorización llenado conforme a su establecimiento, firmado por el propietario y/o representante legal. Link de descarga de los Módulos de Categorización: https://drive.google.com/drive/folders/1PGY3WHSunQAPZwxu4VdC6AsT8R-ql7fA?usp=sharing', 'estado' => true, 'pre_requisito_id' =>  11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Adjuntar Hojas de vida documentada del personal fijo de acuerdo al organigrama de la empresa.', 'estado' => true, 'pre_requisito_id' =>  11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Formulario de Datos para Notificación y Contacto.Link de descarga del documento modelo: https://docs.google.com/document/d/1DNqsEVGamPZcxC9nT1F9zUo5aMh_Vz7k/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Inscripción al sistema nacional de Registro, Categorización y Certificación de Prestadores de Servicios Turísticos - SIRETUR.Link de ingreso al sistema SIRETUR: https://siretur.produccion.gob.bo/auth/login ', 'estado' => true, 'pre_requisito_id' =>  12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            /***************************TRANSPORTE CONGRESOS Y FERIAS DE TURISMO************************ */
            ['descripcion' => 'Carta solicitando "Licencia Turística Departamental" Dirigida al Gobernador del Gobierno autónomo Departamental de Cochabamba HUMBERTO SANCHEZ SANCHEZ https://docs.google.com/document/d/1maCeB7wxs3qAMxb8dVg7KYIxZytunOEs/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Cedula de identidad del propietario y/o representante legal, vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'Testimonio de constitución de sociedad, en caso de S.R.L., S.A., LTDA y otros. (SOLO EN CASO DE SOCIEDAD) (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Poder del Representante Legal (SOLO EN CASO DE SOCIEDAD); (fotocopia)', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Registro de Comercio - SEPREC Vigente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Licencia de Funcionamiento Municipal vigente del municipio correspondiente (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado de inscripción en el Padrón Nacional de Contribuyentes - Servicio de Impuestos Nacionales (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'NIT (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Balance General de Apertura o de la última gestión, según corresponda.', 'estado' => true, 'pre_requisito_id' =>  14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Documento técnico de Categorización Realizado Por Un Profesional En Turismo ó Módulo de Categorización llenado conforme a su establecimiento, firmado por el propietario y/o representante legal. Link de descarga de los Módulos de Categorización: https://drive.google.com/drive/folders/1PGY3WHSunQAPZwxu4VdC6AsT8R-ql7fA?usp=sharing', 'estado' => true, 'pre_requisito_id' =>  15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Adjuntar Hojas de vida documentada del personal fijo de acuerdo al organigrama de la empresa.', 'estado' => true, 'pre_requisito_id' =>  15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Formulario de Datos para Notificación y Contacto.Link de descarga del documento modelo: https://docs.google.com/document/d/1DNqsEVGamPZcxC9nT1F9zUo5aMh_Vz7k/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Inscripción al sistema nacional de Registro, Categorización y Certificación de Prestadores de Servicios Turísticos - SIRETUR.Link de ingreso al sistema SIRETUR: https://siretur.produccion.gob.bo/auth/login ', 'estado' => true, 'pre_requisito_id' =>  16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            /***************************GUIAS DE TURISMO************************ */
            ['descripcion' => 'Carta solicitando "Licencia Turística Departamental" Dirigida al Gobernador del Gobierno autónomo Departamental de Cochabamba HUMBERTO SANCHEZ SANCHEZ https://docs.google.com/document/d/1maCeB7wxs3qAMxb8dVg7KYIxZytunOEs/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  17, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['descripcion' => 'Cedula de identidad(fotocopia)', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado de Nacimiento (Fotocopia)', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificación de antecedentes actualizada FELCC (Original)', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificación de antecedentes actualizada FELCN  (Original)', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado de no violencia  (Original)', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Certificado médico, emitido por personal médico (debe contemplar tipo de sangre)', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'En caso de guías de turismo extranjeros:Carnet Laboral Título Profesional en el área (Turismo), homologado por el Ministerio de Relaciones Exteriores. ', 'estado' => true, 'pre_requisito_id' =>  18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Hoja de vida actualizada y documentada. (debe contener una fotocopia simple del Título profesional y/o Certificados que acrediten estudios en turismo otorgado por las Universidades y/o los Institutos especializados en turismo, reconocidos por el Estado Plurinacional de Bolivia, o acreditar su idoneidad por los medios legales y legítimos correspondientes).', 'estado' => true, 'pre_requisito_id' =>  19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Formulario de Datos para Notificación y Contacto, que incluya la dirección actual del domicilio. Link de descarga del documento modelo: https://docs.google.com/document/d/16xhvzjBBq5vwKTiAwOhoOYlDrfdTwETy/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true ', 'estado' => true, 'pre_requisito_id' =>  15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Formulario de Datos para Notificación y Contacto.Link de descarga del documento modelo: https://docs.google.com/document/d/1DNqsEVGamPZcxC9nT1F9zUo5aMh_Vz7k/edit?usp=sharing&ouid=100932915441407807082&rtpof=true&sd=true', 'estado' => true, 'pre_requisito_id' =>  19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['descripcion' => 'Inscripción al sistema nacional de Registro, Categorización y Certificación de Prestadores de Servicios Turísticos - SIRETUR.Link de ingreso al sistema SIRETUR: https://siretur.produccion.gob.bo/auth/login ', 'estado' => true, 'pre_requisito_id' =>  20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('item_prerequisitos')->insert($item_prerequisitos);
    }
}
