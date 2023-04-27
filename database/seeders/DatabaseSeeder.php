<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Origin;
use App\Models\Ingredient;
use App\Models\Step;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $i = 0;
        $j = 0; 
        for($i = 0; $i < 100; $i++){
            Category::factory()->create([
                'name'=>'Kategori-'.$i
            ]);
            Origin::factory()->create([
                'name'=>'Daerah-'.$i
            ]);
            Recipe::factory()->create([
                'images' => json_encode([
                    'recipe_images\ayam.jpg',
                    'recipe_images\sate.jpg',
                    'recipe_images\risol.jpg'
                ]),
                'portion' => 2,
                'cooking_time' => Carbon::createFromFormat('H:i:s', '09:00:00'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Congue nisi vitae suscipit tellus mauris a. Id leo in vitae turpis massa sed. Bibendum at varius vel pharetra vel turpis nunc eget lorem. Risus at ultrices mi tempus imperdiet nulla. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. Phasellus egestas tellus rutrum tellus. Pellentesque massa placerat duis ultricies lacus. Lacus vestibulum sed arcu non. Turpis massa sed elementum tempus egestas sed sed risus. Felis donec et odio pellentesque diam volutpat commodo. Enim praesent elementum facilisis leo vel fringilla est ullamcorper eget. Et netus et malesuada fames ac turpis egestas maecenas. Praesent tristique magna sit amet purus gravida quis blandit. Justo eget magna fermentum iaculis eu non diam phasellus. A scelerisque purus semper eget duis at tellus at urna. Turpis egestas pretium aenean pharetra magna ac placerat. Enim tortor at auctor urna nunc id cursus metus aliquam. Venenatis urna cursus eget nunc scelerisque viverra mauris in. Condimentum id venenatis a condimentum vitae sapien pellentesque habitant.

                Augue mauris augue neque gravida in. Nibh ipsum consequat nisl vel pretium lectus quam id. Libero nunc consequat interdum varius sit amet mattis vulputate. Sed felis eget velit aliquet sagittis id consectetur. Consequat nisl vel pretium lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Vitae congue mauris rhoncus aenean vel elit. Magna fringilla urna porttitor rhoncus. Urna porttitor rhoncus dolor purus non enim praesent. Faucibus interdum posuere lorem ipsum dolor. Magna ac placerat vestibulum lectus mauris. Purus viverra accumsan in nisl nisi scelerisque. Duis ultricies lacus sed turpis. Ullamcorper morbi tincidunt ornare massa eget egestas purus. Sagittis vitae et leo duis. Purus in massa tempor nec feugiat.
                
                Vitae congue mauris rhoncus aenean vel. Arcu cursus euismod quis viverra nibh cras pulvinar. Nulla malesuada pellentesque elit eget gravida cum. Dictum varius duis at consectetur lorem donec massa. Semper quis lectus nulla at. Tempus imperdiet nulla malesuada pellentesque elit. Nunc congue nisi vitae suscipit tellus mauris a diam. Fusce ut placerat orci nulla. Id interdum velit laoreet id donec ultrices tincidunt arcu. Sed risus ultricies tristique nulla aliquet. Eu feugiat pretium nibh ipsum consequat. In nisl nisi scelerisque eu ultrices vitae auctor. Sed blandit libero volutpat sed cras ornare arcu.
                
                Ac tortor vitae purus faucibus. Lorem dolor sed viverra ipsum. Ut venenatis tellus in metus vulputate eu scelerisque felis. Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Ut enim blandit volutpat maecenas volutpat. Malesuada fames ac turpis egestas integer. A diam maecenas sed enim ut sem. Vel turpis nunc eget lorem dolor sed. Sagittis nisl rhoncus mattis rhoncus urna neque viverra justo. Ut venenatis tellus in metus vulputate eu. Nisl vel pretium lectus quam. Et molestie ac feugiat sed lectus vestibulum. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae auctor.
                
                Dui faucibus in ornare quam viverra. Id velit ut tortor pretium viverra suspendisse potenti nullam ac. Non blandit massa enim nec dui nunc. Non consectetur a erat nam at lectus urna duis convallis. Habitasse platea dictumst quisque sagittis purus sit amet volutpat consequat. Volutpat ac tincidunt vitae semper quis lectus nulla at volutpat. Purus in mollis nunc sed id semper risus. Id leo in vitae turpis massa sed elementum tempus egestas. Leo integer malesuada nunc vel risus commodo viverra maecenas. In massa tempor nec feugiat nisl pretium fusce id. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Odio morbi quis commodo odio aenean sed adipiscing diam donec. Et tortor at risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna. Quam elementum pulvinar etiam non.
                
                Morbi enim nunc faucibus a. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Mattis molestie a iaculis at erat. Nunc sed velit dignissim sodales ut eu. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Id aliquet lectus proin nibh nisl. Sed faucibus turpis in eu. Tempor id eu nisl nunc mi ipsum faucibus vitae aliquet. Magna ac placerat vestibulum lectus mauris ultrices. Ante metus dictum at tempor commodo ullamcorper a lacus. Eu consequat ac felis donec et odio pellentesque diam volutpat. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget. Sit amet consectetur adipiscing elit ut aliquam. Quam lacus suspendisse faucibus interdum. Tellus at urna condimentum mattis pellentesque id.',
                'name' => 'Masakan Legend',
                'origin_id'=> ($i+1),
                'category_id'=> ($i+1)
            ]);
            for( $j = 0; $j < 5; $j++){
                Ingredient::create([
                    'group'=>'Alat',
                    'value'=>'Alat'.$j,
                    'recipe_id'=>($i+1)
                ]);
                Ingredient::create([
                    'group'=>'Bahan',
                    'value'=>'Bahan'.$j,
                    'recipe_id'=>($i+1)
                ]);
            }
            for( $j = 0; $j<5; $j++){
                Step::create([
                    'images'=>json_encode([
                        'step_images\a.jpg',
                        'step_images\b.png',
                        'step_images\c.jpg'
                    ]
                    ),
                    'value'=>'Langkah-'.$j,
                    'recipe_id'=>($i+1)
                ]);
            }
        } 
    }
}
