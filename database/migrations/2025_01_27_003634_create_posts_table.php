<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //Up method will create a post method for us
    public function up(): void
    {//title body 
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //the title is not null here
            $table->string('title')->nullable(false);
            $table->text('body')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

     //Down method will drop when run command
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
