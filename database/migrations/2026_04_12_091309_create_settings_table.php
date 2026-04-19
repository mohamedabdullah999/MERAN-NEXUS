<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name_en')->default('Miran Nexus');
            $table->string('site_name_ar')->default('ميران نيكسس');
            $table->string('hero_title_en')->default('Building Secure Digital Worlds');
            $table->string('hero_title_ar')->default('نبني عوالم رقمية آمنة');
            $table->text('hero_brief_en')->nullable();
            $table->text('hero_brief_ar')->nullable();

            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            $table->string('hero_image')->nullable();
            $table->string('footer_logo')->nullable();
            $table->json('social_links')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
