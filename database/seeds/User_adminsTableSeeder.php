<?php

use Illuminate\Database\Seeder;

class User_adminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
  {
        //
        $data = [ ];
        for($i=0;$i<100;$i++)
        {
        	$tmp['name'] = 'U_'.str_random(4);
        	$tmp['email'] = str_random(8).'@sina.com';
        	$tmp['password'] = str_random(6);
        	$tmp['phone'] = '138'.mt_rand(10000000,99999999);
        	$tmp['avatar'] = 'default.jpg';
        	$tmp['auth'] = mt_rand(1,3);
        	$tmp['created_at'] = date('Y-m-d H:i:s',time());
        	$tmp['updated_at'] = date('Y-m-d H:i:s',time());
        	$data[ ]=$tmp;
        }
        \DB::table('user_admins')->insert($data);
    }
    
}
