<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3 ? [
            User::create([
                "name" => "Mohammed",
                "email" => "mohammed@textyy.com",
                "password" => bcrypt("qazwsxedc")
            ]),
            User::create([
                "name" => "Aymen",
                "email" => "aymen@textyy.com",
                "password" => bcrypt("qazwsxedc")
            ]),
            User::create([
                "name" => "Khaled",
                "email" => "khaled@textyy.com",
                "password" => bcrypt("qazwsxedc")
            ])
        ] : User::take(3)->get();
        
        $posts = [
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.",
            "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            'The standard chunk of Lorem Ipsum used since 1966 is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit purus vel accumsan venenatis. Sed lacus felis, bibendum ac laoreet ac, congue interdum nisi. In rhoncus diam eu gravida interdum. Mauris vel placerat ligula, et dictum risus. In ut odio sit amet libero aliquam eleifend. Proin ornare odio ac varius porta. Nunc viverra aliquet enim id commodo. In quis elit sapien. Cras efficitur tellus non nisi euismod maximus. Integer nibh ex, sollicitudin eget commodo ut, iaculis vitae arcu. Phasellus sed turpis vel massa consequat eleifend. Suspendisse erat augue, euismod ut malesuada rutrum, ultrices eu justo. Sed aliquam urna a risus aliquam, a porttitor sapien suscipit. Curabitur auctor posuere cursus. Donec eget leo est. Pellentesque placerat convallis nibh, eu faucibus tellus suscipit vel.',
            'Mauris libero dolor, fermentum luctus neque eget, vestibulum tempus felis. Aliquam vestibulum leo mauris, vel laoreet velit varius id. Duis sagittis libero in ligula sagittis pretium. Morbi a erat eu ante gravida vehicula. Suspendisse at imperdiet turpis, eu fringilla nibh. Nunc egestas semper arcu id egestas. Nam et purus quis turpis accumsan porttitor facilisis ac lacus. Ut massa sem, laoreet in vulputate sit amet, aliquam eu sem. Nullam vitae erat vehicula, elementum eros in, euismod nunc. Sed fermentum commodo tristique. In sodales tincidunt congue. Curabitur vitae massa cursus, hendrerit mi et, feugiat augue. Nulla a leo auctor, mollis nunc et, cursus urna. Donec ac congue dui. Nulla mi felis, condimentum sit amet arcu vitae, imperdiet posuere augue.',
            'Suspendisse laoreet sed felis non scelerisque. Nunc tristique metus non leo egestas feugiat. Vestibulum urna erat, porta nec tempus a, commodo non magna. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin viverra nisi vel eros lacinia faucibus. Aliquam rutrum arcu non ex tempus, in malesuada elit hendrerit.',
            'Donec a sapien nec leo sodales efficitur. Curabitur congue consequat felis a cursus. Nunc aliquet egestas placerat. Pellentesque bibendum est magna, eget volutpat turpis porttitor non. Duis a vulputate diam. Proin sit amet turpis ut lorem maximus volutpat. Proin ac dictum nisi. Cras pharetra maximus dui eu rutrum. Pellentesque et dolor gravida, euismod lacus non, pulvinar lorem. Nullam non diam a arcu dictum lacinia. Quisque vehicula leo lacus, ac faucibus tellus auctor et. Aliquam enim sapien, dictum ac mollis quis, vulputate eget justo.'
        ];

        foreach($posts as $post){
            $users->random()->post()->create([
                'content' => $post,
                'created_at' => now()->subMinutes(5, 1440)
            ]);
        }

    }
}
