<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class AddFulltextIndexToPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            DB::statement("ALTER TABLE plans ADD FULLTEXT INDEX title_fulltext_index (title) with parser ngram");
            DB::statement("ALTER TABLE plans ADD FULLTEXT INDEX body_fulltext_index (body) with parser ngram");
            DB::statement("ALTER TABLE plans ADD FULLTEXT INDEX address_fulltext_index (address) with parser ngram");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropIndex('title_fulltext_index');
            $table->dropIndex('body_fulltext_index');
            $table->dropIndex('address_fulltext_index');
        });
    }
}
