<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsReferences extends Migration
{
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
    }
}
