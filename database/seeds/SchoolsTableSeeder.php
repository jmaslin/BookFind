<?php
 
use Illuminate\Database\Seeder;
 
class SchoolsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('schools')->delete();
 
        $projects = array(
            ['id' => 1, 'name' => 'Drexel', 'domain' => 'drexel.edu', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('schools')->insert($projects);
    }
 
}