<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'James Cook',
                'designation' => 'HOD of Physis',
                'details_en' => '<p>PHD from Cambridge University</p>',
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fc769269df795fc769269df7b1606904102.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 07:53:23',
                'updated_at' => '2020-12-02 10:15:02',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Savaana Hanna',
                'designation' => 'HOD of English',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fc769627a3e35fc769627a3e51606904162.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:16:02',
                'updated_at' => '2020-12-02 10:16:02',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Roberto Trijulio',
                'designation' => 'Director',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fc769a417c895fc769a417c8b1606904228.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:17:08',
                'updated_at' => '2020-12-02 10:17:08',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Sydney Hollowitz',
                'designation' => 'Chairman',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fc769ecdbc0f5fc769ecdbc101606904300.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:18:20',
                'updated_at' => '2020-12-02 10:18:20',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'James napier',
                'designation' => 'HOD, Mathematics',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fc87bbfe20195fc87bbfe201b1606974399.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 05:46:39',
                'updated_at' => '2020-12-03 05:46:39',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'Hanna Watson',
                'designation' => 'HOD, Chemistry',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fcf322ec85f25fcf322ec85f31607414318.png',
                'status' => 1,
                'created_at' => '2020-12-03 07:42:34',
                'updated_at' => '2020-12-08 07:58:38',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Anna Marie',
                'designation' => 'HOD, Construction Management',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fcf322473efb5fcf322473efd1607414308.png',
                'status' => 1,
                'created_at' => '2020-12-03 07:43:35',
                'updated_at' => '2020-12-08 07:58:28',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'Selestia Ground',
                'designation' => 'HOD, Rural Development',
                'details_en' => NULL,
                'details_fr' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'image' => '5fcf3211c0db35fcf3211c0db51607414289.png',
                'status' => 1,
                'created_at' => '2020-12-03 07:44:35',
                'updated_at' => '2020-12-08 07:58:09',
            ),
        ));
        
        
    }
}