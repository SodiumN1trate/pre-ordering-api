<?php

namespace Database\Seeders;

use App\Models\Navigation;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'shopadmin',
            'password' => Hash::make('asdf'),
        ]);

        Type::create([
            'name' => 'T-shirt',
        ]);

        Type::create([
            'name' => 'Accessories',
        ]);

        Status::create([
            'name' => 'Open',
        ]);

        Status::create([
            'name' => 'Prepared',
        ]);

        Status::create([
            'name' => 'Closed/Delivered',
        ]);

        Navigation::create([
            'name' => 'Home',
            'link' => '/',
            'position' => 0,
        ]);

        Navigation::create([
            'name' => 'Cart',
            'link' => '/cart',
            'position' => 1,
        ]);

        Navigation::create([
            'name' => 'Design symbols',
            'link' => '/design_symbols',
            'position' => 2,
        ]);

        Navigation::create([
            'name' => 'T-Shirts',
            'link' => '/t_shirts',
            'position' => 3,
        ]);

        Navigation::create([
            'name' => 'Accessories',
            'link' => '/accessories',
            'position' => 4,
        ]);

        Navigation::create([
            'name' => 'Admin area',
            'link' => '/admin',
            'position' => 5,
        ]);
    }
}
