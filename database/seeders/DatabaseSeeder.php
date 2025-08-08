<?php

namespace Database\Seeders;

use App\Models\EmailList;
use App\Models\Subscriber;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria um usuário específico para testes
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Cria 10 listas de e-mail com 10 assinantes cada, associadas ao usuário de teste.
        // O método `for()` cuida da relação 'belongsTo' (EmailList pertence a User).
        // O método `has()` cuida da relação 'hasMany' (EmailList tem muitos Subscribers).
        EmailList::factory()
            ->count(10)
            ->for($testUser)
            ->has(Subscriber::factory()->count(10))
            ->create();

        // Cria mais 5 usuários, e para cada um, cria 3 listas com 10 assinantes.
        User::factory(5)->has(EmailList::factory(3)->has(Subscriber::factory(10)))->create();
    }
}
