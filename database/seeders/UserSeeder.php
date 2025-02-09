<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Çağla',
            'surname' => 'Yeşiltepe',
            'email' => 'caglayesiltepe@gmail.com',
            'password' => bcrypt('220423'),
            'company_name' => '',
            'status' => 1,
            'role' => 1,
            'level' => 1,
            'identity_no' => '29743658576',
            'tax_no' => '',
            'birthdate' => '1999-05-31',
            'is_newsletter_check' => 1,
            'is_confirmation_check' => 1,
            'erp_code' => '',
        ]);
    }
}
