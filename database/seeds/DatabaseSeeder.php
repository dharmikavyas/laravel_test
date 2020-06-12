<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;
use App\Model\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if(Admin::all()->count()==0)
        {
            $this->call(AdminSeeder::class);
            $this->command->info("Admin Seeder Execution Completed..");
        }
        else
        {

            $this->command->info("Admin Seeder Already Executed..");
        }


        if(User::all()->count()==0)
        {
            $this->call(UserSeeder::class);
            $this->command->info("User Seeder Execution Completed..");
        }
        else
        {

            $this->command->info("User Seeder Already Executed..");
        }
    }
}
