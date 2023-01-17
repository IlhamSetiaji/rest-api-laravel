<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Fakultas Lorem Ipsum 1',
                'description' => 'Lorem Ipsum',
                'university_id' => 1,
            ],
            [
                'name' => 'Fakultas Lorem Ipsum 2',
                'description' => 'Lorem Ipsum',
                'university_id' => 1,
            ],
            [
                'name' => 'Fakultas Lorem Ipsum 3',
                'description' => 'Lorem Ipsum',
                'university_id' => 1,
            ],
        ])->each(function ($faculties) {
            Faculty::create($faculties);
        });
    }
}
