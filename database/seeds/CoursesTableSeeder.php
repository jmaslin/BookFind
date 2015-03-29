<?php
 
use Illuminate\Database\Seeder;
 
class CoursesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('courses')->delete();
 
        $courses = array(
            ['id' => 1, 'name' => 'Intro to Business 101', 'shortcode' => 'BUSN 101', 'school_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Statistics 200', 'shortcode' => 'STAT 200', 'school_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Law Basics 001', 'shortcode' => 'LAW 001', 'school_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Basket Weaving 101', 'shortcode' => 'BSKT 101', 'school_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime]      
        );

        // Uncomment the below to run the seeder
        DB::table('courses')->insert($courses);
    }
 
}