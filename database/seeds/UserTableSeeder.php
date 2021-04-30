<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Shubham',
            'email'=>'shubhamsm4175@gmail.com',
            'password'=>bcrypt('12345678'),
            'admin'=>1,
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'about'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo odio quibusdam unde provident error itaque beatae accusantium necessitatibus veritatis iusto deleniti voluptatem animi repellendus, ratione voluptas repudiandae a eaque sint.',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com',
            'avatar'=>'link to image'
        ]);
    }
}
