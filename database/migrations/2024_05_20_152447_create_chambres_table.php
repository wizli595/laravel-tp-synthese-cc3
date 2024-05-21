<?php

use App\Models\Categorie;
use App\Models\Hotel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('chambres', function (Blueprint $table) {
            $table->increments('numchambre');
            $table->string('telephone');
            // ############################# Scenario 1 ###############################
            $table->foreignId('numhotel')->constrained('hotels', 'numhotel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Categorie::class, 'CodeCategorie')->constrained('categories', 'CodeCategorie')->onDelete('cascade')->onUpdate('cascade');
            // ############################# Scenario 2 ###############################
            /*  $table->foreignId('hotel_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); */
            // ############################# Scenario 3 ###############################
            // primary keys should be increments()
            /* $table->integer('numhotel')->unsigned();
            $table->integer('CodeCategorie')->unsigned();
            $table->foreign('numhotel')->references('numhotel')->on('hotels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('CodeCategorie')->references('CodeCategorie')->on('categories')->onDelete('cascade')->onUpdate('cascade'); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
