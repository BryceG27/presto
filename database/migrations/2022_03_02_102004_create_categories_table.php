<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        }); 
        
        $categories = [
            'Informatica', 'Mobili', 'Motori', 'Hobbies', 'Musica', 'Libri', 'Immobili', 'Abiti', 'Giochi', 'Elettrodomestici'
        ];

        foreach ($categories as $category) {
           $t = new Category();
           $t->name = $category;
           $t->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
