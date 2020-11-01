<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproval extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval', function (Blueprint $table) {
            $table->id();
            $table->string('document_id');
            $table->string('type');
            $table->string('email');
            $table->string('status_id')->nullable();
            $table->string('audit_at');
            $table->timestamp('audit_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approval');
    }
}
