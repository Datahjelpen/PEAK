<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_types', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('slug')->unique();
            $t->unsignedInteger('template')->nullable()->default(null);
            // $t->foreign('template')->references('id')->on('templates');
            $t->timestamps();
        });

        Schema::create('statuses', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('slug');
            $t->unsignedInteger('type_id');
            $t->foreign('type_id')->references('id')->on('object_types')->onDelete('cascade');
            
            $t->unique( ['slug', 'type_id'] );

            $t->timestamps();
        });

        Schema::create('objects', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('slug');
            $t->text('text')->nullable()->default(null);
            $t->text('excerpt')->nullable()->default(null);
            $t->unsignedInteger('type_id');
            $t->foreign('type_id')->references('id')->on('object_types')->onDelete('cascade');
            $t->unsignedInteger('author');
            $t->foreign('author')->references('id')->on('users');
            $t->unsignedInteger('template')->nullable()->default(null);
            // $t->foreign('template')->references('id')->on('templates');
            $t->boolean('comments');
            $t->unsignedInteger('status');
            $t->foreign('status')->references('id')->on('statuses');

            $t->unique( ['slug', 'type_id', 'status'] );

            $t->timestamps();
        });

        Schema::create('taxonomies', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('slug');
            $t->unsignedInteger('type_id');
            $t->foreign('type_id')->references('id')->on('object_types')->onDelete('cascade');
            $t->boolean('hierarchical')->default(true);

            $t->unique( ['slug', 'type_id'] );

            $t->timestamps();
        });

        Schema::create('terms', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('slug');
            $t->unsignedInteger('parent_id')->nullable()->default(null);
            $t->foreign('parent_id')->references('id')->on('terms')->onDelete('cascade');
            $t->unsignedInteger('template')->nullable()->default(null);
            // $t->foreign('template')->references('id')->on('templates');
            $t->unsignedInteger('taxonomy_id');
            $t->foreign('taxonomy_id')->references('id')->on('taxonomies')->onDelete('cascade');

            $t->unique( ['slug', 'taxonomy_id'] );

            $t->timestamps();
        });

        Schema::create('object_term', function (Blueprint $t) {
            $t->increments('id');
            $t->unsignedInteger('object_id');
            $t->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
            $t->unsignedInteger('term_id');
            $t->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');

            $t->unique( ['object_id', 'term_id'] );

            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
        Schema::dropIfExists('object_types');
        Schema::dropIfExists('taxonomies');
        Schema::dropIfExists('terms');
        Schema::dropIfExists('object_term');
    }
}
