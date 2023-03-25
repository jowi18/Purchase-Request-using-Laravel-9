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
        Schema::create('tbldetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tblheader_id');
            $table->foreign('tblheader_id')->references('id')->on('tblheaders'); //foreign key for header
            $table->string('req_particulars');
            $table->longText('req_description');
            $table->integer('qty');
            $table->string('uom');
            $table->datetime('date_needed');
            $table->longText('req_remarks')->nullable();
            $table->longText('req_image')->nullable();
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
        Schema::dropIfExists('tbldetails');
    }
};
