<?php

use Illuminate\Database\Seeder;

class PressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('presses')->delete();
        
        \DB::table('presses')->insert(array (
            0 => 
            array (
                'id' => 3,
                'title_en' => 'Global University Charity Program',
                'title_fr' => NULL,
                'slug' => NULL,
                'short_description_en' => NULL,
                'short_description_fr' => NULL,
                'long_description_en' => NULL,
                'long_description_fr' => NULL,
                'published_by' => 'Atti Global',
                'published_date' => '2020-12-02 16:25:00',
                'image' => '5fc77036d27075fc77036d27091606905910.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:45:10',
                'updated_at' => '2020-12-02 10:45:10',
            ),
            1 => 
            array (
                'id' => 4,
                'title_en' => 'Admission Open for Fall 2020',
                'title_fr' => NULL,
                'slug' => NULL,
                'short_description_en' => NULL,
                'short_description_fr' => NULL,
                'long_description_en' => NULL,
                'long_description_fr' => NULL,
                'published_by' => 'Atti Global',
                'published_date' => '2020-12-02 16:26:00',
                'image' => '5fc7708dc25375fc7708dc25381606905997.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:46:37',
                'updated_at' => '2020-12-02 10:46:37',
            ),
            2 => 
            array (
                'id' => 6,
                'title_en' => 'Open Inter-College Basketball Competiton',
                'title_fr' => NULL,
                'slug' => NULL,
                'short_description_en' => '<p>Date: 22nd December</p>

<p>Time: 02:00 PM</p>

<p>Venue: University Playground</p>

<p>Entry Fee: $1 for outsiders, Free for University Students</p>

<p>&nbsp;</p>

<p>Championship Prize : $5,000 with 2 Semester Fee Discount</p>

<p>1st Runner Up : $3,000 with 1 semester Fee Discount</p>

<p>2nd Runner Up : $2,000</p>',
                'short_description_fr' => NULL,
                'long_description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Senectus et netus et malesuada fames. Quisque egestas diam in arcu cursus euismod. Odio aenean sed adipiscing diam donec adipiscing tristique. Mattis nunc sed blandit libero volutpat sed cras ornare. Hac habitasse platea dictumst quisque. Purus sit amet volutpat consequat mauris nunc. Sagittis id consectetur purus ut faucibus pulvinar elementum integer enim. Posuere morbi leo urna molestie at elementum. Nullam vehicula ipsum a arcu. Id diam vel quam elementum pulvinar etiam non quam. Eleifend quam adipiscing vitae proin. Nam aliquam sem et tortor consequat id porta. Ac tortor vitae purus faucibus ornare. Purus non enim praesent elementum facilisis leo vel fringilla est. Euismod elementum nisi quis eleifend quam adipiscing vitae proin. Sit amet volutpat consequat mauris nunc congue nisi. Ut sem nulla pharetra diam sit amet nisl suscipit. Potenti nullam ac tortor vitae.</p>

<p>Vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus. Vestibulum morbi blandit cursus risus. Pellentesque dignissim enim sit amet venenatis urna cursus eget. Mauris a diam maecenas sed enim. Arcu vitae elementum curabitur vitae nunc. Dui nunc mattis enim ut tellus elementum sagittis vitae. Volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque. Aliquam purus sit amet luctus venenatis lectus magna fringilla urna. Rhoncus urna neque viverra justo nec ultrices.</p>',
                'long_description_fr' => NULL,
                'published_by' => 'SCI University',
                'published_date' => '2020-12-03 12:31:00',
                'image' => '5fc88af3545485fc88af35454a1606978291.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 06:51:31',
                'updated_at' => '2020-12-10 11:17:33',
            ),
        ));
        
        
    }
}