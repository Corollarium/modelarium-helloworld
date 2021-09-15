<?php
/**
 * This file was automatically generated by Modelarium 
 * Please do not change or you may break later migration patches.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost20210915200544Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('title', 256);
            $table->text('content');
            $table->char('country', 3);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }

    /**
     * The graphql model used to generate this migration. This will be used for
     * patching later.
     */
    public function model(): string
    {
        return <<<EOF
# start graphql
type Post @migrationTimestamps {
  id: ID!
  title: Title! @modelFillable @renderable(title: true, label: "Title", comment: "Please add a descriptive title", placeholder: "Type here", size: "large", card: true, table: true)
  content: Text! @modelFillable @renderable(label: "Content", comment: "Your post contents")
  country: Countrycodeiso3! @modelFillable @renderable(label: "Country", comment: "Pick a country", table: true)
}
# end graphql
EOF;
    }
}