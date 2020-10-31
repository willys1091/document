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
        doctype::create(['name' => 'Internal Memo','prefix'=>'IOM','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        doctype::create(['name' => 'Invoice','prefix'=>'INV','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
        doctype::create(['name' => 'MOM','prefix'=>'MOM','color'=>'#000000', 'active' => '1', 'audit_at' => '0','audit_date' => now(),]);
    }
}
