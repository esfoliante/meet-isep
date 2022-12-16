<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Engenharia Informática',
            'slug' => 'LEI'
        ]);

        Course::create([
            'name' => 'Biorrecursos',
            'slug' => 'LB'
        ]);

        Course::create([
            'name' => 'Engenharia Biomédica',
            'slug' => 'LEB'
        ]);

        Course::create([
            'name' => 'Engenharia Civil',
            'slug' => 'LEC'
        ]);

        Course::create([
            'name' => 'Engenharia Sistemas',
            'slug' => 'LES'
        ]);

        Course::create([
            'name' => 'Engenharia de Telecomunicações e Informática',
            'slug' => 'LETI'
        ]);

        Course::create([
            'name' => 'Engenharia de Gestão Industrial',
            'slug' => 'LEGI'
        ]);

        Course::create([
            'name' => 'Engenharia Eletrotécnica - Sistemas Elétricos',
            'slug' => 'LEESE'
        ]);

        Course::create([
            'name' => 'Engenharia Eletrotécnica e de Computadores',
            'slug' => 'LEEC'
        ]);

        Course::create([
            'name' => 'Engenharia Geotécnica e Geoambiente',
            'slug' => 'LEGG'
        ]);

        Course::create([
            'name' => 'Engenharia Mecánica',
            'slug' => 'LEM'
        ]);

        Course::create([
            'name' => 'Engenharia Mecánica Automóvel',
            'slug' => 'LEMA'
        ]);

        Course::create([
            'name' => 'Engenharia Química',
            'slug' => 'LEQ'
        ]);
    }
}
