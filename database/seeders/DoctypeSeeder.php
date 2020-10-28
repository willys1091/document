<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\doctype;

class DoctypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        doctype::create(['name' => 'IOM', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        doctype::create(['name' => 'MOM', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
