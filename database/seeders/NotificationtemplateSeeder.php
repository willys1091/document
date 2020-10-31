<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationtemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notificationtemplate')->insert(['name' => 'password reset','subject' => 'password reset','message' => '<p>Hello {name},<br><br>Please follow the link below to reset your password.<br>{resetlink}</br><br></<br>Best regards,<br><br></p>']);
    }
}
