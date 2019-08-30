<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->text('counter')->nullable();
            $table->string('ga_counter')->nullable();
            $table->string('ym_counter')->nullable();
            $table->string('tag_manager')->nullable();
            $table->string('calltouch')->nullable();
            $table->boolean('calibri')->default(0);
            $table->text('scripts_head')->nullable();
            $table->text('scripts_footer')->nullable();
            $table->string('phone',120)->nullable();
            $table->string('contact_email',120)->nullable();
            $table->text('contact_map')->nullable();
            $table->string('logo')->nullable();
            $table->string('social_vk')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_inst')->nullable();
            $table->string('social_telegramm')->nullable();
            $table->string('social_viber')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_wup')->nullable();
            $table->string('social_skype')->nullable();
            $table->string('social_tw')->nullable();            
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
        Schema::dropIfExists('settings');
    }
}
