<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Authors;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = collect([
            [
                "name" => "Евгение Стрекоза",
                "url" => "https://litnet.com/ru/mariya-luneva-u244464"
            ],
            [
                'name' => "Enjoykin",
                'url' => 'https://www.youtube.com/@Enjoykin'
            ],
            [
                'name' => 'RomNero',
                'url' => 'https://www.youtube.com/@RomNero',
            ],
            [
                'name' => 'Vlad Mishustin',
                'url' => 'https://www.youtube.com/@fakng-engineer'
            ],
            [
                'name' => 'Hacker School',
                'url' => 'https://www.youtube.com/@hackers666'
            ],
            [
                'name' => 'Kinoman',
                'url' => 'https://www.youtube.com/@KinomanTrailers'
            ],
            [
                "name" => "Мария Лунева",
                "url" => "https://litnet.com/ru/mariya-luneva-u244464"
            ],
            [
                "name" => "Амир Сунаев",
                "url" => "https://litnet.com/ru/mariya-luneva-u244464"
            ],
            [
                "name" => "Люся Лунева",
                "url" => "https://litnet.com/ru/mariya-luneva-u244464"
            ],
            [
                "name" => "Федя Лунеев",
                "url" => "https://litnet.com/ru/mariya-luneva-u244464"
            ],
        ]);

        $authors->each(function ($item) {
            Authors::create($item);
        });
    }
}