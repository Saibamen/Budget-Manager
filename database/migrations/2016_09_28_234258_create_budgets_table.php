<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration {

    public function up() {
        Schema::create("budgets", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->unsignedInteger("source_id");
            $table->unsignedInteger("type_id");
            $table->decimal("value", 12, 2);
            $table->date("date");
            $table->unsignedInteger("user_id");
            $table->mediumText("comment")->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("budgets");
    }

}
