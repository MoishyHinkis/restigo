<?php

namespace Database\Seeders;

use App\Models\Supllier;
use Illuminate\Database\Seeder;

class SupllierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supllier::factory()
            ->create([
                'name' => 'אוסם',
                'customer_number' => 2365,
                'min_order' => 200,
                'logo' => "https://en.wikipedia.org/wiki/Osem_(company)#/media/File:Osem_Logo.svg"
            ]);
        Supllier::factory()
            ->create([
                'name' => 'החברה המרכזית למשקאות בעמ',
                'customer_number' => 452654,
                'min_order' => 300,
                'logo' => "https://he.wikipedia.org/wiki/%D7%94%D7%97%D7%91%D7%A8%D7%94_%D7%94%D7%9E%D7%A8%D7%9B%D7%96%D7%99%D7%AA_%D7%9C%D7%99%D7%99%D7%A6%D7%95%D7%A8_%D7%9E%D7%A9%D7%A7%D7%90%D7%95%D7%AA_%D7%A7%D7%9C%D7%99%D7%9D#/media/%D7%A7%D7%95%D7%91%D7%A5:Hachevra_Hamerkazit_Clean.svg"
            ]);
        Supllier::factory()
            ->create([
                'name' => 'מוצרי איכות אמריקאיים בעמ',
                'customer_number' => null,
                'min_order' => 500,
                'logo' => null
            ]);
    }
}
