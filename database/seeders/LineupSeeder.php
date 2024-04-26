<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lineup')->insert([
            'name' => 'Kanye West',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula metus sit amet tellus tincidunt.',
            'path' => '/assets/images/artists/kanye.jpg',
        ]);

        DB::table('lineup')->insert([
            'name' => 'Ali B',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula metus sit amet tellus tincidunt.',
            'path' => '/assets/images/artists/ali.jpeg',
        ]);

        DB::table('lineup')->insert([
            'name' => 'Snoop Dog',
            'description' => 'Ey rustig man, neem een jointje',
            'path' => '/assets/images/artists/snoop.jpeg',
        ]);

        DB::table('lineup')->insert([
            'name' => 'Marco',
            'description' => 'Kom je ook op de bbq?',
            'path' => '/assets/images/artists/marcooo.jpeg',
        ]);
    }
}
