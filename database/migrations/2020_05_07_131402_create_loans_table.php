<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('ssn');
            $table->date('date_of_birth');
            $table->decimal('loan_amount', 12, 2);
            $table->decimal('rate', 4,2);
            $table->integer('term');
            $table->decimal('apr', 6, 2);

            $table->biginteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('loan_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
