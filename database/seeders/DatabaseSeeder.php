<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Navigation;
use App\Models\Product;
use App\Models\Size;
use App\Models\Status;
use App\Models\Symbol;
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

        Product::create([
            'name' => 'krekls',
            'image' => 'https://i.imgur.com/frhnBT1.png',
            'type_id' => 1,
            'price' => '32.00',
        ]);

        Product::create([
            'name' => 'Krūze',
            'image' => 'https://img.muji.net/img/item/4547315873913_1260.jpg',
            'type_id' => 2,
            'price' => '10.00',
        ]);

        Symbol::create([
            'image' => 'https://cdn-icons-png.flaticon.com/512/91/91012.png',
        ]);

        Navigation::create([
            'name' => 'Home',
            'link' => '/',
            'position' => 0,
        ]);

        Color::create([
           'color' => '#fff',
            'type_id' => 1,
        ]);

        Color::create([
            'color' => '#fff',
            'type_id' => 2,
        ]);

        Navigation::create([
            'name' => 'Cart',
            'link' => '/cart',
            'position' => 1,
        ]);

        Product::create([
            'name' => 'T-shirt',
            'image' => 'https://i.imgur.com/frhnBT1.png',
            'type_id' => 1,
            'price' => '30.00',
        ]);

        Product::create([
            'name' => 'Cup',
            'image' => 'https://img.muji.net/img/item/4547315873913_1260.jpg',
            'type_id' => 2,
            'price' => '10.00',
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
            'link' => '/admin_area',
            'position' => 5,
        ]);

        Size::create([
            'name' => 'S',
            'type_id' => 1,
        ]);

        Size::create([
            'name' => 'M',
            'type_id' => 1,
        ]);

        Size::create([
            'name' => 'L',
            'type_id' => 1,
        ]);

        Size::create([
            'name' => 'XL',
            'type_id' => 1,
        ]);

        Size::create([
            'name' => '250ml',
            'type_id' => 2,
        ]);
    }
}
