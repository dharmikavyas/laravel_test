<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;

class AdminSeeder extends Seeder
{    
    public function run()
    {
       DB::Table('admins')->delete();

        if(DB::Table('admins')->get()->count()==0)
        {
            $model = array(
			    array(
				    'id'=>1,
                    'fname'=>'Admin',
                    'lname' =>'Super',
				    'email'=>'admin@sin.com',
                    'password' => bcrypt('123456')
                ),
            );
            foreach ($model as $models)
            {
	         	Admin::create($models);
            }
        }
    }
}
