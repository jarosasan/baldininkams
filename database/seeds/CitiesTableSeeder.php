<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $json = File::get("database/data/CitiesLt.json");
        $data = json_decode($json,JSON_UNESCAPED_UNICODE);
        foreach ($data as $obj) {
            City::create([
                'name'=>html_entity_decode($obj['city'])
            ]);
        }
    }
}
