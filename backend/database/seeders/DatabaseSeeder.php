<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Subject::create(['name' => 'sports']);
        \App\Models\Subject::create(['name' => 'colors']);
        \App\Models\Subject::create(['name' => 'fruits']);

        \App\Models\Word::create(['en' => 'basketball', 'hu' => 'kosárlabda', 'subject_id' => 1]);
        \App\Models\Word::create(['en' => 'soccer', 'hu' => 'labdarúgás', 'subject_id' => 1]);
        \App\Models\Word::create(['en' => 'running', 'hu' => 'futás', 'subject_id' => 1]);
        \App\Models\Word::create(['en' => 'rugby', 'hu' => 'rögbi', 'subject_id' => 1]);
        \App\Models\Word::create(['en' => 'volleyball', 'hu' => 'röplabda', 'subject_id' => 1]);
        \App\Models\Word::create(['en' => 'blue', 'hu' => 'kék', 'subject_id' => 2]);
        \App\Models\Word::create(['en' => 'yellow', 'hu' => 'sárga', 'subject_id' => 2]);
        \App\Models\Word::create(['en' => 'red', 'hu' => 'piros', 'subject_id' => 2]);
        \App\Models\Word::create(['en' => 'green', 'hu' => 'zöld', 'subject_id' => 2]);
        \App\Models\Word::create(['en' => 'white', 'hu' => 'fehér', 'subject_id' => 2]);
        \App\Models\Word::create(['en' => 'raspberry', 'hu' => 'málna', 'subject_id' => 3]);
        \App\Models\Word::create(['en' => 'strawberry', 'hu' => 'eper', 'subject_id' => 3]);
        \App\Models\Word::create(['en' => 'pineapple', 'hu' => 'ananász', 'subject_id' => 3]);
        \App\Models\Word::create(['en' => 'apple', 'hu' => 'alma', 'subject_id' => 3]);
        \App\Models\Word::create(['en' => 'coconut', 'hu' => 'kókusz', 'subject_id' => 3]);

    }
}
