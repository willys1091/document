<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        status::create(['name' => 'Open', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Accept', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Reject', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Revision', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
