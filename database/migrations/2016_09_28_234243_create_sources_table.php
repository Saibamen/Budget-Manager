<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration {

    public function up() {
        Schema::create("sources", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->unsignedInteger("type_id")->nullable();
            $table->decimal("value", 12, 2)->nullable();
            $table->mediumText("comment");
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("sources");
    }

}
