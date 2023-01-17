<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
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
                'name' => 'Universitas Lorem Ipsum',
                'description' => 'Lorem Ipsum',
            ],
        ])->each(function ($university) {
            University::create($university);
        });
    }
}
