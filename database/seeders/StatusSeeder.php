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
        status::create(['name' => 'Draft','color'=>'#1d2124', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Open','color'=>'#007bff', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Accept','color'=>'#28a745', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Reject','color'=>'#c82333', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Revision','color'=>'#e0a800', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
