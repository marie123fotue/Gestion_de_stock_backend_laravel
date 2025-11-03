<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  app\Models\Produit;
use  app\Models\categorie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('categorie_id');
            $table->text('description')->nullable();
            $table->string('photo')->nullable();

            $table->integer('prix');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
        // Schema::table('produits', function (Blueprint $table) {
        //    $table->dropForeignIdFor(Produit::class);
        // });
        
    }
};
