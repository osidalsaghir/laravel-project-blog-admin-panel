<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SeederSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'blog_name'=>'osid blog',
            'phone_number'=>'00905398364387',
            'blog_email'=>'osid.alsagheer@gmail.com',
            'address'=>'manisa/turkey'
        ]);
    }
}
