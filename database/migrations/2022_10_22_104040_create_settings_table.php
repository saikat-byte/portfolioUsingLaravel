<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('favicon');
            $table->text('logo_footer');
            $table->text('footer_text')->nullable();
            $table->text('footer_icon_1')->nullable();
            $table->text('footer_icon_1_url')->nullable();
            $table->text('footer_icon_2')->nullable();
            $table->text('footer_icon_2_url')->nullable();
            $table->text('footer_icon_3')->nullable();
            $table->text('footer_icon_3_url')->nullable();
            $table->text('footer_icon_4')->nullable();
            $table->text('footer_icon_4_url')->nullable();
            $table->text('footer_copyright');
            $table->text('preloader_status');
            $table->text('theme_color');
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
};
