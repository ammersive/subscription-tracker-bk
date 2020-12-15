<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("categories", function (Blueprint $table) {
            $table->id();
            $table->string("category_name", 50)->default("");
        });

        //pivot table
        Schema::create("category_subscription", function (Blueprint $table) {
            // still have an id column
            $table->id();
            // create the article id column and foreign key
            $table->foreignId("subscription_id")
                ->constrained()
                ->onDelete("cascade");
            // create the tag id column and foreign key
            $table->foreignId("category_id")
                ->constrained()
                ->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('category_subscription');
        Schema::dropIfExists('categories');
    }
}
