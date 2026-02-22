<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [

    'up' => function (Builder $schema) {

        $schema->create('content_pages', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->boolean('is_published')->default(1);
            $table->timestamps();

        });

    },

    'down' => function (Builder $schema) {

        $schema->dropIfExists('content_pages');

    }

];
