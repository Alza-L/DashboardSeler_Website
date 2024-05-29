<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Customer;

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

        Country::create([
            'country_name' => 'United States',
            'country_slug' => 'united-states',
            'sales' => '2500',
            'value' => '$230,900',
            'bounce' => '29.9%',
        ]);
        
        Country::create([
            'country_name' => 'Germany',
            'country_slug' => 'germany',
            'sales' => '3.900',
            'value' => '$440,000',
            'bounce' => '40.22%',
        ]);
        
        Country::create([
            'country_name' => 'Great Britain',
            'country_slug' => 'great-britain',
            'sales' => '1.400',
            'value' => '$190,700',
            'bounce' => '23.44%',
        ]);
        
        Country::create([
            'country_name' => 'Brazil',
            'country_slug' => 'brazil',
            'sales' => '562',
            'value' => '$143,960',
            'bounce' => '32.14%',
        ]);

        Customer::create([
            'country_id' => '3',
            'customer_name' => 'Sudarmo Aji',
            'customer_slug' => 'sudarmo-aji',
            'email' => 'sudarmo891@gmail.com',
            'status' => 'Work',
            'ordered' => '67',
        ]);
        
        Customer::create([
            'country_id' => '4',
            'customer_name' => 'Atalarik Satriyo',
            'customer_slug' => 'atalarik-satriyo',
            'email' => 'atalarik123@gmail.com',
            'status' => 'Student',
            'ordered' => '54',
        ]);
        
        Customer::create([
            'country_id' => '1',
            'customer_name' => 'Alza Lloyd',
            'customer_slug' => 'alza-lloyd',
            'email' => 'alzalloyd789@gmail.com',
            'status' => 'Student',
            'ordered' => '21',
        ]);
    }
}
