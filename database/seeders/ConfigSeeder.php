<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        config::create(['name' => 'title', 'value' => 'Document Management System', 'audit_at' => '0','audit_date' => now(),]);
        config::create(['name' => 'tagline', 'value' => 'Document Management System', 'audit_at' => '0','audit_date' => now(),]);
        config::create(['name' => 'admin_email', 'value' => 'admin@vasanta.co.id', 'audit_at' => '0','audit_date' => now(),]);
        config::create(['name' => 'timezone', 'value' => 'Asia/Jakarta', 'audit_at' => '0','audit_date' => now(),]);

    }
}
