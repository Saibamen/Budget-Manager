<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesReferences extends Migration
{
    public function up()
    {
        Schema::table('sources', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    public function down()
    {
    }
}
