<?php
 
use Illuminate\Database\Seeder;
 
class UsersCoursesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user__courses')->delete();
 
        $user__courses = array(
            ['id' => 1, 'user_id' => '1', 'course_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'user_id' => '1', 'course_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'user_id' => '2', 'course_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'user_id' => '2', 'course_id' => '4', 'created_at' => new DateTime, 'updated_at' => new DateTime]      
        );

        // Uncomment the below to run the seeder
        DB::table('user__courses')->insert($user__courses);
    }
 
}