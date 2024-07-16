<?php

use App\Models\Configuration;
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
        Configuration::create([
            "key" => "DEFAULT",
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Configuration::truncate();
    }
};
