<?php

use Illuminate\Database\Seeder;

class FeaturedStudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('featured_students')->delete();
        
        \DB::table('featured_students')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'balram signg',
                'title' => 'featured for top student',
                'description' => '<p>top marks in mid term</p>',
                'image' => '5ff40ac75b7675ff40ac75b7691609829063.png',
                'status' => 1,
                'created_at' => '2021-01-05 06:44:23',
                'updated_at' => '2021-01-05 06:44:23',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'cliff Burton',
                'title' => 'featured for best sportsmen',
                'description' => '<p>Captain of wiinning team in football</p>',
                'image' => '5ff40c156b0355ff40c156b0361609829397.png',
                'status' => 1,
                'created_at' => '2021-01-05 06:45:38',
                'updated_at' => '2021-01-05 06:49:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rohit',
                'title' => 'Food',
                'description' => '<p>asdasd</p>',
                'image' => '5ff40c2d674cd5ff40c2d674cf1609829421.png',
                'status' => 1,
                'created_at' => '2021-01-05 06:50:21',
                'updated_at' => '2021-01-05 06:50:21',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'asif',
                'title' => 'youngest',
                'description' => '<p>youngest stuedent&nbsp;</p>',
                'image' => '5ff40c52b92385ff40c52b923a1609829458.png',
                'status' => 1,
                'created_at' => '2021-01-05 06:50:58',
                'updated_at' => '2021-01-05 06:50:58',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'best student',
                'title' => 'best student',
                'description' => '<p>best student of the year</p>',
                'image' => '5ff4113aad47c5ff4113aad47e1609830714.png',
                'status' => 1,
                'created_at' => '2021-01-05 07:11:54',
                'updated_at' => '2021-01-05 07:11:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'STudent Presedent',
                'title' => 'president of student',
                'description' => '<p>won my election</p>',
                'image' => '5ff4116ac14a75ff4116ac14a91609830762.png',
                'status' => 1,
                'created_at' => '2021-01-05 07:12:42',
                'updated_at' => '2021-01-05 07:12:42',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'creative student',
                'title' => 'creative stuedent of the year',
                'description' => '<p>came up with the most creative idea of the year</p>',
                'image' => '5ff411979c0415ff411979c0431609830807.png',
                'status' => 1,
                'created_at' => '2021-01-05 07:13:27',
                'updated_at' => '2021-01-05 07:13:27',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Mark',
                'title' => 'Foodie of the Yea',
                'description' => '<p>Most money spent on college cafeteria</p>',
                'image' => '5ff411c4d3fa95ff411c4d3faa1609830852.png',
                'status' => 1,
                'created_at' => '2021-01-05 07:14:12',
                'updated_at' => '2021-01-05 07:14:12',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Lemmy Kilminster',
                'title' => 'stuendet of the month',
                'description' => '<p>short descasd as asd asdjiaos asd jna asiodja asd jaosdlkj aosdj oasdn oalshdn oaslkhdn lkhasnd nalsdn alsdn lans lnasldn alsndl ansdlnasl dnasld nalsdn als nalsdnal nlkasdnoqwlkwndlaskndkasjsfhkasn asnthso thisb si nsi tghe ebstf hs tgyihng oif u the year nad tish is the fastest tyoing in tghe owkd wintghoy ebvenlooikking asd nasd asdasdasd asdasd asdasdkgsjab&nbsp;</p>',
                'image' => '5ff412281dd055ff412281dd071609830952.png',
                'status' => 1,
                'created_at' => '2021-01-05 07:15:52',
                'updated_at' => '2021-01-05 07:15:52',
            ),
        ));
        
        
    }
}