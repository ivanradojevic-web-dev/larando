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
                'name' => 'Devlasi',
                'slug' => Str::slug('Devlasi', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UPK8H3K2M-74ea4320898d-72',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U01LUEK3BJ9-f1e926917fbe-72',
            ],
            [
                'name' => 'Fantazija',
                'slug' => Str::slug('Fantazija', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-U7859SFMZ-a7e449870d7e-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UHGKS36KG-36dc263a400a-512',
            ],
            [
                'name' => 'Garlandini',
                'slug' => Str::slug('Garlandini', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UH6FVGSSD-7b15df775008-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UM41J1F63-88bbd84a202a-512',
            ],
            [
                'name' => 'IspodPsi',
                'slug' => Str::slug('IspodPsi', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UHEJX8L3A-385bf6191838-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U0393VC044W-4bec5fa33d97-512',
            ],
            [
                'name' => 'Ja vragolan i Moj Deda',
                'slug' => Str::slug('Ja vragolan i Moj Deda', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UMSD5HDMY-96f640c97760-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UM55CU6NL-46a072502909-512',
            ],
            [
                'name' => 'Kad Jaganjci Utihnu',
                'slug' => Str::slug('Kad Jaganjci Utihnu', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UDJ8535F0-ed9b28c71aae-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U023MHS6R8B-848c68f13787-512',
            ],
            [
                'name' => 'Sick Leave on Beta',
                'slug' => Str::slug('Sick Leave on Beta', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UHF43BNDS-6873a3a474ee-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UM25NMHS4-3ed4973f2f40-512',
            ],
            [
                'name' => 'Under Pressure Girls',
                'slug' => Str::slug('Under Pressure Girls', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UGMT7NEDP-4d6522f2e4f7-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-UGUSYDZNC-58f59e2e44e5-512',
            ],
            [
                'name' => 'Katana',
                'slug' => Str::slug('Katana', '-'),
                'photo_1'=>'https://ca.slack-edge.com/T643W8FME-UPL83QAUU-9c23f3e0801b-512',
                'photo_2'=>'https://ca.slack-edge.com/T643W8FME-U038W1JC8CX-44867dffbbf7-512',
            ],
        ]);

        \App\Models\Fixture::insert([
            [
                'round' => 1,
                'match_number' => 1,
                'team_id'=> 5,
            ],
            [
                'round' => 1,
                'match_number' => 1,
                'team_id'=> 9,
            ],
            [
                'round' => 1,
                'match_number' => 2,
                'team_id'=> 2,
            ],
            [
                'round' => 1,
                'match_number' => 2,
                'team_id'=> 7,
            ],
            [
                'round' => 1,
                'match_number' => 3,
                'team_id'=> 1,
            ],
            [
                'round' => 1,
                'match_number' => 3,
                'team_id'=> 6,
            ],
            [
                'round' => 1,
                'match_number' => 4,
                'team_id'=> 8,
            ],
            [
                'round' => 1,
                'match_number' => 4,
                'team_id'=> 4,
            ],

            [
                'round' => 2,
                'match_number' => 1,
                'team_id'=> 5,
            ],
            [
                'round' => 2,
                'match_number' => 1,
                'team_id'=> 3,
            ],
            [
                'round' => 2,
                'match_number' => 2,
                'team_id'=> 2,
            ],
            [
                'round' => 2,
                'match_number' => 2,
                'team_id'=> 9,
            ],
            [
                'round' => 2,
                'match_number' => 3,
                'team_id'=> 1,
            ],
            [
                'round' => 2,
                'match_number' => 3,
                'team_id'=> 7,
            ],
            [
                'round' => 2,
                'match_number' => 4,
                'team_id'=> 8,
            ],
            [
                'round' => 2,
                'match_number' => 4,
                'team_id'=> 6,
            ],

            [
                'round' => 3,
                'match_number' => 1,
                'team_id'=> 2,
            ],
            [
                'round' => 3,
                'match_number' => 1,
                'team_id'=> 3,
            ],
            [
                'round' => 3,
                'match_number' => 2,
                'team_id'=> 1,
            ],
            [
                'round' => 3,
                'match_number' => 2,
                'team_id'=> 9,
            ],
            [
                'round' => 3,
                'match_number' => 3,
                'team_id'=> 8,
            ],
            [
                'round' => 3,
                'match_number' => 3,
                'team_id'=> 7,
            ],
            [
                'round' => 3,
                'match_number' => 4,
                'team_id'=> 4,
            ],
            [
                'round' => 3,
                'match_number' => 4,
                'team_id'=> 6,
            ],

            [
                'round' => 4,
                'match_number' => 1,
                'team_id'=> 5,
            ],
            [
                'round' => 4,
                'match_number' => 1,
                'team_id'=> 2,
            ],
            [
                'round' => 4,
                'match_number' => 2,
                'team_id'=> 1,
            ],
            [
                'round' => 4,
                'match_number' => 2,
                'team_id'=> 3,
            ],
            [
                'round' => 4,
                'match_number' => 3,
                'team_id'=> 8,
            ],
            [
                'round' => 4,
                'match_number' => 3,
                'team_id'=> 9,
            ],
            [
                'round' => 4,
                'match_number' => 4,
                'team_id'=> 4,
            ],
            [
                'round' => 4,
                'match_number' => 4,
                'team_id'=> 7,
            ],

            [
                'round' => 5,
                'match_number' => 1,
                'team_id'=> 5,
            ],
            [
                'round' => 5,
                'match_number' => 1,
                'team_id'=> 1,
            ],
            [
                'round' => 5,
                'match_number' => 2,
                'team_id'=> 8,
            ],
            [
                'round' => 5,
                'match_number' => 2,
                'team_id'=> 3,
            ],
            [
                'round' => 5,
                'match_number' => 3,
                'team_id'=> 4,
            ],
            [
                'round' => 5,
                'match_number' => 3,
                'team_id'=> 9,
            ],
            [
                'round' => 5,
                'match_number' => 4,
                'team_id'=> 6,
            ],
            [
                'round' => 5,
                'match_number' => 4,
                'team_id'=> 7,
            ],

            [
                'round' => 6,
                'match_number' => 1,
                'team_id'=> 5,
            ],
            [
                'round' => 6,
                'match_number' => 1,
                'team_id'=> 8,
            ],
            [
                'round' => 6,
                'match_number' => 2,
                'team_id'=> 2,
            ],
            [
                'round' => 6,
                'match_number' => 2,
                'team_id'=> 1,
            ],
            [
                'round' => 6,
                'match_number' => 3,
                'team_id'=> 4,
            ],
            [
                'round' => 6,
                'match_number' => 3,
                'team_id'=> 3,
            ],
            [
                'round' => 6,
                'match_number' => 4,
                'team_id'=> 6,
            ],
            [
                'round' => 6,
                'match_number' => 4,
                'team_id'=> 9,
            ],

        ]);
    }
}
