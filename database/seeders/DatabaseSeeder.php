<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $testUser = User::factory()->hasContacts(30)->createOne(['email' => 'test@test.com']);
        $users = User::factory(3)->hasContacts(5)->create()->each(
            fn ($user) => $user->contacts->first()->sharedWithContacts->attach($testUser->id)
        );

        $testUser->contacts->first()->sharedWithUsers()->attach($users->pluck('id'));
    }
}
