<?php
 
use Illuminate\Database\Seeder;
 
class BooksTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('books')->delete();
 
        $books = array(
            ['id' => 1, 'name' => 'Resume', 
             'isbn' => '000001', 
             'uploader_id' => '1', 
             'url' => 'http://www.justinmaslin.com/JustinMaslin.pdf',
             'created_at' => new DateTime, 'updated_at' => new DateTime,
             'course_id' => '1'],
            ['id' => 2, 'name' => 'Chicken Chicken Chicken', 
             'isbn' => '000002', 
             'uploader_id' => '1', 
             'url' => 'https://isotropic.org/papers/chicken.pdf',
             'created_at' => new DateTime, 'updated_at' => new DateTime,
             'course_id' => '2'],
             ['id' => 3, 'name' => 'Potato Potato Potato', 
             'isbn' => '000003', 
             'uploader_id' => '2', 
             'url' => 'https://isotropic.org/papers/chicken.pdf',
             'created_at' => new DateTime, 'updated_at' => new DateTime,
             'course_id' => '3'],
            ['id' => 4, 'name' => 'Bark Bark Bark', 
             'isbn' => '0000024', 
             'uploader_id' => '2', 
             'url' => 'https://isotropic.org/papers/chicken.pdf',
             'created_at' => new DateTime, 'updated_at' => new DateTime,
             'course_id' => '4']                                
        );
 
        // Uncomment the below to run the seeder
        DB::table('books')->insert($books);
    }
 
}