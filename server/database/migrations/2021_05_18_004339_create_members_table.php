<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kota');
            $table->string('telepon');
            $table->string('tokopedia_id');
            $table->text('url_tokopedia');
            $table->string('bukalapak_id');
            $table->text('url_bukalapak');
            $table->string('lazada_id');
            $table->text('url_lazada');
            $table->string('shopee_id');
            $table->text('url_shopee');
            $table->string('facebook_id');
            $table->text('url_facebook');
            $table->string('instagram_id');
            $table->text('url_instagram');
            $table->string('tiktok_id');
            $table->text('url_tiktok');
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
        Schema::dropIfExists('resellers');
    }
}
