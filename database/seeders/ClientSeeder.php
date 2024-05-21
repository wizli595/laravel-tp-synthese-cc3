<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Commentaire;
use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::factory()->count(5)->create();
        foreach ($clients as $client) {
            $comments = Commentaire::factory(2)->create([
                'commentable_id' => $client->codeClient,
                'commentable_type' => Client::class,
            ]);
            $likes = Like::factory(2)->create([
                'likeable_id' => $client->codeClient,
                'likeable_type' => Client::class,
            ]);
            $client->commentaires()->saveMany($comments);
            $client->likes()->saveMany($likes);
        }
    }
}
