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
        doctype::create(['name' => 'IOM','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        doctype::create(['name' => 'MOM','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
