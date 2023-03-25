<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblheaders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('status_id');
            $table->string('department');
            $table->string('pr_no');
            $table->string('approver_status');
            $table->datetime('approve_date');
            $table->datetime('date_created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblheaders');
    }
};
