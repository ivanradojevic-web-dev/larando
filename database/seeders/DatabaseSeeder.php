<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Team::insert([
            [
                'name' => 'Sick Leave on Beta',
                'slug' => Str::slug('Sick Leave on Beta', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UHF43BNDS-6873a3a474ee-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UM25NMHS4-3ed4973f2f40-512',
            ],
            [
                'name' => 'Fantazija',
                'slug' => Str::slug('Fantazija', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-U7859SFMZ-a7e449870d7e-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UHGKS36KG-36dc263a400a-512',
            ],
            [
                'name' => 'Miki i Djordje',
                'slug' => Str::slug('IspodPsi', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UHEJX8L3A-385bf6191838-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U03HSTV9W2W-8095172021ee-512',
            ],
            [
                'name' => 'Jovana Vera',
                'slug' => Str::slug('Devlasi', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-ULFNCRLQ5-e14e1d6c9777-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U01CR72ANKZ-a3d73429000d-512',
            ],
            [
                'name' => 'Dacha Acke',
                'slug' => Str::slug('Garlandini', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UGMT7NEDP-4d6522f2e4f7-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U023MHS6R8B-848c68f13787-512',
            ],
            [
                'name' => 'Bojana Igor',
                'slug' => Str::slug('Ja vragolan i Moj Deda', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-U038W1JC8CX-44867dffbbf7-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UDJ8535F0-ed9b28c71aae-512',
            ],
            [
                'name' => 'Biba Dusan',
                'slug' => Str::slug('Kad Jaganjci Utihnu', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UPK8H3K2M-74ea4320898d-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U01G3CT62CE-11da1b8c3f59-512',
            ],
            
            [
                'name' => 'Zoran Nikolina',
                'slug' => Str::slug('yoran nifew', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-U03HCAGPR0F-30e68092695b-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U01JSP0JTL1-0f1a12246144-512',
            ],
            [
                'name' => 'Boki Ninja',
                'slug' => Str::slug('boki niiac', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UM41J1F63-88bbd84a202a-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UPL83QAUU-9c23f3e0801b-512',
            ],
            [
                'name' => 'Daki Ivana',
                'slug' => Str::slug('Team 10', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UM55CU6NL-46a072502909-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UH6FVGSSD-7b15df775008-512',
            ],
            [
                'name' => 'Milijn Ivan',
                'slug' => Str::slug('Miljan Ivan', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UMSD5HDMY-96f640c97760-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U01LUEK3BJ9-f1e926917fbe-512',
            ],
            [
                'name' => 'Teodora Tamara',
                'slug' => Str::slug('Teo tam', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-U039417ARFG-257c3dfe1552-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UJ3K1HMH8-19f35a6cafa7-512',
            ],
        ]);
    }
}
