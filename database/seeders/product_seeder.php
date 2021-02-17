<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name'=>'Samsung TV',
            'price'=>'15000',
            'category'=>'tv',
            'description'=> " A smart tv for smart people like you",
            'img-url'=>'http://127.0.0.1:8000/images/tv1.jpg'

  
        ],[
            'name'=>'samsung phone',
            'price'=>'20000',
            'category'=>'mobile',
            'description'=> " A smart phone for smart people like you",
            'img-url'=>'http://127.0.0.1:8000/images/mobile1.jpg'

  
        ],[
            'name'=>'Apple phone',
            'price'=>'40000',
            'category'=>'mobile',
            'description'=> " A smart phone for smart people like you",
            'img-url'=>'http://127.0.0.1:8000/images/mobile2.jpg'

  
        ],[
            'name'=>'Google phone',
            'price'=>'30000',
            'category'=>'mobile',
            'description'=> " A smart phone for smart people like you",
            'img-url'=>'http://127.0.0.1:8000/images/mobile3.jpg'

  
        ],[
            'name'=>'Samsung fridge',
            'price'=>'25000',
            'category'=>'fridge',
            'description'=> " A smart fridge for smart people like you",
            'img-url'=>'http://127.0.0.1:8000/images/fridge1.jpg'

  
        ],[
            'name'=>'JIO TV',
            'price'=>'15000',
            'category'=>'tv',
            'description'=> " A smart tv for smart people like you",
            'img-url'=>'http://127.0.0.1:8000/images/tv2.jpg'

  
        ]
        
        ]);
    }
}
