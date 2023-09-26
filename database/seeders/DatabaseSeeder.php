<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Paul Rio Marolop',
            'username' => 'paulll',
            'email' => 'paul@gmail.com',
            'password' => bcrypt('paul123')
        ]);
        
        User::create([
            'name' => 'Admin Theo',
            'username' => 'admin',
            'email' => 'theo@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        
        User::factory(3)->create();
        
        Category::create([
            'name' => 'Modul',
            'slug' => 'modul'
        ]);

        Category::create([
            'name' => 'SOP',
            'slug' => 'sop'
        ]);

        Category::create([
            'name' => 'Pelayanan',
            'slug' => 'pelayanan'
        ]);

        Post::factory(14)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa voluptatum ex temporibus consequatur dolores odio,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa voluptatum ex temporibus consequatur dolores odio, cum ducimus praesentium fugit? Sapiente iusto ducimus molestias veritatis odio delectus explicabo minima quos qui at, aspernatur facilis labore necessitatibus quibusdam quod fugit eum quidem magni illum perspiciatis! Excepturi magni repellendus esse fuga sunt quae ullam natus nihil reiciendis molestias quia pariatur deleniti accusamus inventore distinctio ducimus et libero id nesciunt corrupti doloribus voluptatum, assumenda cum. Sequi quisquam itaque tenetur earum numquam repellat quae quia voluptate amet quod iste autem enim consequatur, ipsam iure eveniet saepe tempore nihil maiores quasi illum ad aliquam recusandae praesentium. Nulla in, exercitationem corporis aperiam error minus incidunt, voluptas aut voluptatem quisquam natus nam minima maiores tempore praesentium provident? Fugiat.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa voluptatum ex temporibus consequatur dolores odio,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa voluptatum ex temporibus consequatur dolores odio, cum ducimus praesentium fugit? Sapiente iusto ducimus molestias veritatis odio delectus explicabo minima quos qui at, aspernatur facilis labore necessitatibus quibusdam quod fugit eum quidem magni illum perspiciatis! Excepturi magni repellendus esse fuga sunt quae ullam natus nihil reiciendis molestias quia pariatur deleniti accusamus inventore distinctio ducimus et libero id nesciunt corrupti doloribus voluptatum, assumenda cum. Sequi quisquam itaque tenetur earum numquam repellat quae quia voluptate amet quod iste autem enim consequatur, ipsam iure eveniet saepe tempore nihil maiores quasi illum ad aliquam recusandae praesentium. Nulla in, exercitationem corporis aperiam error minus incidunt, voluptas aut voluptatem quisquam natus nam minima maiores tempore praesentium provident? Fugiat.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa voluptatum ex temporibus consequatur dolores odio,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa voluptatum ex temporibus consequatur dolores odio, cum ducimus praesentium fugit? Sapiente iusto ducimus molestias veritatis odio delectus explicabo minima quos qui at, aspernatur facilis labore necessitatibus quibusdam quod fugit eum quidem magni illum perspiciatis! Excepturi magni repellendus esse fuga sunt quae ullam natus nihil reiciendis molestias quia pariatur deleniti accusamus inventore distinctio ducimus et libero id nesciunt corrupti doloribus voluptatum, assumenda cum. Sequi quisquam itaque tenetur earum numquam repellat quae quia voluptate amet quod iste autem enim consequatur, ipsam iure eveniet saepe tempore nihil maiores quasi illum ad aliquam recusandae praesentium. Nulla in, exercitationem corporis aperiam error minus incidunt, voluptas aut voluptatem quisquam natus nam minima maiores tempore praesentium provident? Fugiat.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
