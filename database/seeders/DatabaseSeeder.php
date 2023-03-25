<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'ENG_CLERK',
           'email' => 'clerkeng@example.com',
           'user_level' => 1,
           'password' => bcrypt('123456'),
           'department' => 'ENGINEERING',
           'email_verified_at' => NOW()
        ]);

        \App\Models\User::factory()->create([
            'name' => 'IT_CLERK',
           'email' => 'clerkit@example.com',
           'user_level' => 1,
           'password' => bcrypt('123456'),
           'department' => 'IT',
           'email_verified_at' => NOW()
        ]);

        \App\Models\User::factory()->create([
            'name' => 'IT_MANAGER',
           'email' => 'managerit@example.com',
           'user_level' => 2,
           'password' => bcrypt('123456'),
           'department' => 'IT',
           'email_verified_at' => NOW()
        ]);

        \App\Models\User::factory()->create([
            'name' => 'ENGINEERING_MANAGER',
           'email' => 'managereng@example.com',
           'user_level' => 2,
           'password' => bcrypt('123456'),
           'department' => 'ENGINEERING',
           'email_verified_at' => NOW()
        ]);


        
        \App\Models\User::factory()->create([
            'name' => 'CFO',
           'email' => 'cfo@example.com',
           'user_level' => 4,
           'password' => bcrypt('123456'),
           'department' => 'CIG',
           'email_verified_at' => NOW()
        ]);


       

        \App\Models\User::factory()->create([
            'name' => 'OM',
           'email' => 'om@example.com',
           'user_level' => 3,
           'password' => bcrypt('123456'),
           'department' => 'Procurement',
           'email_verified_at' => NOW()
        ]);

        \App\Models\User::factory()->create([
            'name' => 'CEO',
           'email' => 'ceo@example.com',
           'user_level' => 6,
           'password' => bcrypt('123456'),
           'department' => 'Executive',
           'email_verified_at' => NOW()
        ]);

        \App\Models\User::factory()->create([
            'name' => 'controller',
           'email' => 'controller@example.com',
           'user_level' => 5,
           'password' => bcrypt('123456'),
           'department' => 'Executive',
           'email_verified_at' => NOW()
        ]);

              /*
        \App\Models\Tbluom::factory(3)->create([
            'uom' => 'pcs',
           'uom_abv' => 'Pieces',
        ]);
          */
    }
}
