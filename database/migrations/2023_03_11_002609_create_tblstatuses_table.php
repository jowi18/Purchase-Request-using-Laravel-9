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
        Schema::create('tblstatuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tblheader_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('tblheader_id')->references('id')->on('tblheaders'); //foreign key for tblheaders
            $table->foreign('user_id')->references('id')->on('users'); //foreign key for users
            $table->string('status_code');
            $table->string('approver')->nullable();
            $table->string('verifyby')->nullable();
            $table->string('approveby')->nullable();
            $table->datetime('dateOfAction')->nullable();
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
        Schema::dropIfExists('tblstatuses');
    }
};
