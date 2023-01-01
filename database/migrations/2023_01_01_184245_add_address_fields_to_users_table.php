<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('occupation')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('no_of_shares')->nullable();
            $table->decimal('invested_amount', 9, 3)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('dob');
            $table->dropColumn('occupation');
            $table->dropColumn('citizenship_no');
            $table->dropColumn('mobile');
            $table->dropColumn('no_of_shares');
            $table->dropColumn('invested_amount');
        });
    }
}
