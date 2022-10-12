<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Macbook Air', 'Airpods', 'iMac', 'AirTag', 'Macbook Pro', 'iPhone'];

        foreach ($tags as $tag) {
            
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);
            $newTag->save();

        }
    }
}
