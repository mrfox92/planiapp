<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::factory()->count(20)->create();
        Subject::factory()->create([
            'name'          =>  'Sistemas Operativos',
            'description'   => 'sistemas operativos especialidad de programación técnico profesional tercero medio.',
        ]);
        Subject::factory()->create([
            'name'          =>  'Programación y bases de datos',
            'description'   => 'Programación y bases de datos, asignatura de especialidad de programación técnico profesional tercero medio. introducción a la programación estructurada y concepto de bases de datos relacionales.'
        ]);
        Subject::factory()->create([
            'name'          =>  'Administración de bases de datos',
            'description'   => 'Administración de bases de datos, asignatura de especialidad de programación técnico profesional cuarto medio. Introducción al rol del administrador de bases de datos relacionales.'
        ]);
        Subject::factory()->create([
            'name'          =>  'Diseño de bases de datos relacionales',
            'description'   => 'Diseño de bases de datos, asignatura de especialidad de programación técnico profesional cuarto medio. Introducción al diseño, creación y manipulación de bases de datos relacionales. fases del diseño de bases de datos.'
        ]);
        Subject::factory()->create([
            'name'          =>  'Desarrollo de Aplicaciones web',
            'description'   => 'Desarrollo de aplicaciones en ambiente web, asignatura de especialidad de programación técnico profesional cuarto medio. Introducción a los lenguajes que permiten la creación de aplicaciones en entorno web y exploración de este vasto ecosistema de desarrollo.'
        ]);
        Subject::factory()->create([
            'name'          =>  'Orientación',
            'description'   => 'Orientación es una asignatura de especialidad de programación técnico profesional tercero medio. Tiene como objetivo realizar orientación tanto vocacional, como en ámbito estudiantil y de convivencia escolar.'
        ]);
    }
}
