<?php
 
use Illuminate\Database\Seeder;
 
class BooksTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('books')->delete();
 
        $projects = array(
            ['id' => 1, 'name' => 'Accounting', 'isbn' => '0123450', 'uploader_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('books')->insert($projects);
    }
 
}