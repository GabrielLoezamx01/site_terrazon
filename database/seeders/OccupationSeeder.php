<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Empresario/a",
            "Director/a General (CEO)",
            "Director/a Financiero (CFO)",
            "Abogado/a Corporativo",
            "Médico Especialista",
            "Cirujano/a",
            "Ingeniero/a de Software Senior",
            "Consultor/a de Negocios",
            "Director/a de Marketing",
            "Inversionista",
            "Banquero/a de Inversión",
            "Fundador/a de Startups",
            "Piloto Comercial",
            "Gerente de Ventas Internacionales",
            "Arquitecto/a Renombrado",
            "Propietario/a de Franquicias",
            "Profesional de Bienes Raíces de Lujo",
            "Dentista Especializado/a",
            "Director/a de Recursos Humanos",
            "Ejecutivo/a de Publicidad o Medios",
            "Ingeniero",
            "Abogado",
            "Dentista",
            "Cirujano",
            "Comerciante",
            "Empresario",
            "Mesero",
            "Cocinero",
            "Chef",
            "Personal de restaurante",
            "Gerente",
            "Arquitecto",
            "Doctor",
            "Diseñador",
            "Diseñador gráfico",
            "Programador",
            "Empleado de limpieza",
            "Empleado de mantenimiento",
            "Estilista",
            "Manicurista",
            "Barbero",
            "Maestro",
            "Chofer",
            "Albañil",
            "Obrero",
            "Plomero",
            "Electricista",
            "Carpintero",
            "Agrónomo",
            "Enfermero",
            "Contador",
            "Finanzas",
            "Seguridad",
            "Técnico",
            "Secretario",
            "Asistente administrativo",
            "Conductor"
        ];
        foreach ($data as $key => $value) {
            $data[$key] = ['name' => $value];
        }
        DB::table('occupations')->insert($data);
    }
}
