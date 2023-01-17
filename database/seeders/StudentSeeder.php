<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
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
                'name' => 'John Doe',
                'nim' => Str::random(5),
                'gender' => 'L',
                'address' => 'Jl. Lorem Ipsum',
            ],
            [
                'name' => 'Jane Doe',
                'nim' => Str::random(5),
                'gender' => 'P',
                'address' => 'Jl. Lorem Ipsum',
            ],
        ])->each(function ($students) {
            Student::create($students);
        });
    }
}
