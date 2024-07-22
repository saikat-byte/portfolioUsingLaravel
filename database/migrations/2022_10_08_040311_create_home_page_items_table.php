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
        Schema::create('home_page_items', function (Blueprint $table) {
            $table->id();
            $table->text('banner_title')->nullable();
            $table->text('banner_person_name');
            $table->text('banner_person_designation')->nullable();
            $table->text('banner_description')->nullable();
            $table->text('banner_button_text')->nullable();
            $table->text('banner_button_url')->nullable();
            $table->text('banner_photo');
            $table->text('about_subtitle')->nullable();
            $table->text('about_title');
            $table->text('about_description')->nullable();
            $table->text('about_person_name')->nullable();
            $table->text('about_person_phone')->nullable();
            $table->text('about_person_email')->nullable();
            $table->text('about_icon1')->nullable();
            $table->text('about_icon1_url')->nullable();
            $table->text('about_icon2')->nullable();
            $table->text('about_icon2_url')->nullable();
            $table->text('about_icon3')->nullable();
            $table->text('about_icon3_url')->nullable();
            $table->text('about_icon4')->nullable();
            $table->text('about_icon4_url')->nullable();
            $table->text('about_icon5')->nullable();
            $table->text('about_icon5_url')->nullable();
            $table->text('about_photo');
            $table->text('about_status');
            $table->text('skill_subtitle')->nullable();
            $table->text('skill_title')->nullable();
            $table->text('skill_status');
            $table->text('qualification_subtitle')->nullable();
            $table->text('qualification_title')->nullable();
            $table->text('education_title')->nullable();
            $table->text('experience_title')->nullable();
            $table->text('qualification_status');
            $table->text('counter1_number');
            $table->text('counter1_name');
            $table->text('counter2_number');
            $table->text('counter2_name');
            $table->text('counter3_number');
            $table->text('counter3_name');
            $table->text('counter4_number');
            $table->text('counter4_name');
            $table->text('counter_background');
            $table->text('counter_status');
            $table->text('testimonial_subtitle')->nullable();
            $table->text('testimonial_title')->nullable();
            $table->text('testimonial_background');
            $table->text('testimonial_status');
            $table->text('client_subtitle')->nullable();
            $table->text('client_title')->nullable();
            $table->text('client_status');
            $table->text('service_subtitle')->nullable();
            $table->text('service_title')->nullable();
            $table->text('service_total');
            $table->text('service_status');
            $table->text('portfolio_subtitle')->nullable();
            $table->text('portfolio_title')->nullable();
            $table->text('portfolio_status');
            $table->text('blog_subtitle')->nullable();
            $table->text('blog_title')->nullable();
            $table->text('blog_status');
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
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
        Schema::dropIfExists('home_page_items');
    }
};
