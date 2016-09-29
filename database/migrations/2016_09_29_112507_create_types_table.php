<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration {

    public function up() {
        Schema::create("types", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
        });
    }

    public function down() {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        Schema::dropIfExists("types");
        DB::statement("SET FOREIGN_KEY_CHECKS = 1");
    }

}
