<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
            $table->string('sequence');
            $table->string('typedoc_id');
            $table->string('status');
            $table->string('division');
            $table->string('title');
            $table->text('message');
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
        Schema::dropIfExists('document');
    }
}
