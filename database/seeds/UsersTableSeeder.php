<?php
 
use Illuminate\Database\Seeder;
 
class UsersTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $users = array(
            ['id' => 1, 'name' => 'Justin', 
             'email' => 'jtm342@drexel.edu', 
             'password' => '$2y$10$ssqIJLYWVZuriMG3VaSDEuIcIccFqNBJmjZvxMGGgcvLn6uFmDBm2',
             'school_id' => '1', 
             'created_at' => new DateTime, 'updated_at' => new DateTime],     
            ['id' => 2, 'name' => 'Bob', 
             'email' => 'bob@temple.edu', 
             'password' => '$2y$10$ssqIJLYWVZuriMG3VaSDEuIcIccFqNBJmjZvxMGGgcvLn6uFmDBm2',
             'school_id' => '2', 
             'created_at' => new DateTime, 'updated_at' => new DateTime],                
        );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
 
}