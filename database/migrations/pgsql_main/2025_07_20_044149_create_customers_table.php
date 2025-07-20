<?php

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
        Schema::connection('pgsql_main')->create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code')->nullable();
            $table->string('customer_name')->nullable();
            $table->jsonb('customer_data')->nullable();
            $table->string('customer_ebiz')->nullable();
            $table->string('customer_crm')->nullable();
            $table->string('customer_account')->nullable();
            $table->string('customer_pmkb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_main')->dropIfExists('customers');
    }
};
