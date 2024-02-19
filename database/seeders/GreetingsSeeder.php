<?php

namespace Database\Seeders;

use App\Models\Greeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GreetingsSeeder extends Seeder
{
    /**jjklhkjhjkhiuhiujh
     * Run the database seeds.
     */
    public function run(): void
    {
        Greeting::create([
            'paragraf1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'paragraf2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'paragraf3' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'quote' => 'tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'photo' => 'default.jpg',
            'jenis' => 'greeting',
        ]);
        Greeting::create([
            'paragraf1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'paragraf2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'paragraf3' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'paragraf4' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'paragraf5' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'photo' => 'default.jpg',
            'photo2' => 'default2.jpg',
            'jenis' => 'history',
        ]);
        Greeting::create([
            'paragraf1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iusto odio ex sed! Neque asperiores fugiat ut distinctio nihil ratione illo fugit quos explicabo aperiam ad, ab voluptatibus dolore aliquam nesciunt excepturi iusto ipsa expedita dolor omnis esse quae? Modi, temporibus atque! Nesciunt, facere distinctio. Quisquam sint atque animi maxime temporibus quidem excepturi vero, tempore nemo nesciunt repellendus consequatur dolores saepe, sit odio earum, commodi veniam? Sequi consequatur nihil autem magni asperiores consequuntur ratione minima cumque? Est perferendis fuga quidem.',
            'text' => '[["asdsadasd"],["asdadqwd"],["asdwqd"],["asdwqdas"]]',
            'photo' => 'default.jpg',
            'jenis' => 'visi',
        ]);

        Greeting::create([
            'paragraf1' => 'Jl.Kh.Ahmad Dahlan No.15 Banjarpayoman, RT.03/RW.04, Amadanom Barat, Amadanom, Kec. Dampit, Kabupaten Malang, Jawa Timur 65181',
            'paragraf2' => 'semeru@gmail.com',
            'paragraf3' => 'Indera eka 123',
            'paragraf4' => '083210812380',
            'photo' => 'default.jpg',
            'jenis' => 'contact',
        ]);
    }
}
