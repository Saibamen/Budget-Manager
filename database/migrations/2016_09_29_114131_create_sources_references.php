<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesReferences extends Migration {

    public function up() {
        Schema::table("sources", function (Blueprint $table) {
            $table->foreign("type_id")->references("id")->on("types");
        });
    }

    public function down() {
    }

}
