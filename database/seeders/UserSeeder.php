<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\users;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        users::create(['username' => 'Test', 'auth_key' => 'w943Qzcz_7m0RtNstjOTN2IklVuLhYiG', 'password_hash' => md5('password'),'email' => 'test@VASANTA.CO.ID','status' => '10','created_at' => now(),'updated_at' => now(),'verification_token' => 'dQzL13-qxu1daST2JSsr2Kd-C52ExqDQ_1578890827','ifca_id' => 'IT001']);
    }
}
