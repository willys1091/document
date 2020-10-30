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
        status::create(['name' => 'Draft','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Open','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Accept','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Reject','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        status::create(['name' => 'Revision','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
