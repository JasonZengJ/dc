<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/29/15
 * Time: 10:51 AM
 */

use Illuminate\Database\Seeder;
use laravel\Pets;

class PetsTableSeeder extends Seeder {

    public function run() {
        DB::table('pets')->delete();

        for ($i=0; $i < 10; $i++) {
            Pets::create([
                'pet_name'   => '狗'.$i,
                'pet_age'    => 1,
                'pet_gender' => 1,
                'pet_birth'  => time(),
            ]);
        }
    }

}