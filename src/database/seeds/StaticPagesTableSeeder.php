<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StaticPagesTableSeeder extends Seeder{

    public function run()
    {
        DB::table('static_pages')->delete();
        Model::unguard();

        DB::table('static_pages')->insert(
            array(
                array(
                    'title'=> 'Page 1',
                    'article' => 'Article 1',
                    'description' => 'Description 1',
                    'tags' => 'Tag 1',
                    'slug' => 'Slug 1',
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),

                array(
                    'title'=> 'Page 2',
                    'article' => 'Article 2',
                    'description' => 'Description 2',
                    'tags' => 'Tag 2',
                    'slug' => 'Slug 2',
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),
            ));
    }

}