<?php

use Illuminate\Database\Seeder;

class AdvertStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_status')->insert([
            'id'=> \App\Models\AdvertStatus::NEW_AD,
            'name'=>'new',
        ]);
        DB::table('advert_status')->insert([
            'id'=> \App\Models\AdvertStatus::ACTIVE,
            'name'=>'active',
        ]);
        DB::table('advert_status')->insert([
            'id'=> \App\Models\AdvertStatus::INACTIVE,
            'name'=>'inactive',
        ]);
        DB::table('advert_status')->insert([
            'id'=> \App\Models\AdvertStatus::DELETED,
            'name'=>'deleted',
        ]);

    }
}
