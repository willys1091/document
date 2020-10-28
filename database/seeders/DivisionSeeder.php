<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        division::create(['name' => 'IT', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Finance', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Accounting' , 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Legal', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Marketing', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Sales', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Busdev', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'GA', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Purchasing', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
