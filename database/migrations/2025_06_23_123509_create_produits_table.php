<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_categorie'); 

            $table->string("name");
            $table->string("slug")->unique();
            $table->text("description");
            $table->decimal('price', 15, 2);
            $table->string("image");
            $table->timestamps();

            $table->foreign('id_categorie')->references('id_categorie')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
