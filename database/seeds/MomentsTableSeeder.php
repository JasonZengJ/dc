<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/29/15
 * Time: 11:06 AM
 */
use Illuminate\Database\Seeder;
use laravel\Moments;

class MomentsTableSeeder extends Seeder {

    public function run () {
        DB::table('Moments')->delete();

        for ($i=0; $i < 10; $i++) {
            Moments::create([
                'moment_title' => '霸气狗狗'.$i,
                'moment_type'  => 1,
            ]);
        }
    }

}