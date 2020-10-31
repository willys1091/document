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
        division::create(['name' => 'IT','prefix'=>'IT', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Finance','prefix'=>'FIN', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Accounting' ,'prefix'=>'ACC', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Legal','prefix'=>'LEG', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Marketing','prefix'=>'MKT', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Sales','prefix'=>'SA', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Busdev','prefix'=>'BD', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'GA','prefix'=>'GA', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Purchasing','prefix'=>'PUR', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        division::create(['name' => 'Human Resource','prefix'=>'HRD', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
