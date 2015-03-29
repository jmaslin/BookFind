<?php
 
use Illuminate\Database\Seeder;
 
class SchoolsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('schools')->delete();
 
        $schools = array(
            ['id' => 1, 'name' => 'Drexel University', 'domain' => 'drexel.edu', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Temple University', 'domain' => 'temple.edu', 'created_at' => new DateTime, 'updated_at' => new DateTime]        
        );
 
        // Uncomment the below to run the seeder
        DB::table('schools')->insert($schools);
    }
 
}