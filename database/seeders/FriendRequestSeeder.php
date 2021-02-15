<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FriendRequest;

class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FriendRequest::factory()
        ->count(25)
        ->create();
    }
}
