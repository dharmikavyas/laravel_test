<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        
       DB::Table('users')->delete();

        if(DB::Table('users')->get()->count()==0)
        {
            $model = array(
			    array(
				    'id'=>1,
                    'username' =>'dharmika',
				    'email'=>'dharmika@gmail.com',
                    'password' => bcrypt('123456')
                ),
            );
            foreach ($model as $models)
            {
	         	User::create($models);
            }
        }
    }
}
