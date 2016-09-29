<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsReferences extends Migration {

    public function up() {
        Schema::table("budgets", function (Blueprint $table) {
            $table->foreign("source_id")->references("id")->on("sources");
            $table->foreign("type_id")->references("id")->on("types");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    public function down() {
    }

}
