<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         DB::table('users')->insert([
//             'name' => 'employee',
//             'Password' => Hash::make(12345),
//             'role' => '1',
//         ]
//     );

//     DB::table('users')->insert([
//         'name' => 'admin',
//         'Password' => Hash::make(12345),
//         'role' => '2',
//     ]
// );

$imageFileName = 'Pfp.jpg'; // Replace with the actual image file name
$imagePath = public_path('IMG/' . $imageFileName);

$imageData = base64_encode(file_get_contents($imagePath));


        DB::table('users')->insert([
            'name' => 'employee',
            'Password' => Hash::make(12345),
            'email' => 'employee@gmail.com',
            'division' => 'Jakarta',
            'image' => $imageData,
            'role' => '1',
        ]
        );

        DB::table('users')->insert([
        'name' => 'admin',
        'Password' => Hash::make(12345),
        'email' => 'admin@gmail.com',
        'division' => 'Jakarta',
        'image' => $imageData,
        'role' => '2',
        ]
        );

        DB::table('users')->insert([
            'name' => 'Lintang',
            'Password' => Hash::make(12345),
            'email' => 'saya.lintang@gmail.com',
            'division' => 'Jakarta',
            'image' => $imageData,
            'role' => '1',
            ]
        );
    }
}
