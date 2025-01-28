<?php

use App\Models\BuyGood;
use App\Models\Good;
use App\Models\SellGood;
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
        Schema::create('good_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Good::class, 'good_id');
            $table->enum('transaction', ['buy', 'sell']);
            $table->foreignIdFor(BuyGood::class, 'buy_good_id')->nullable()->default(null);
            $table->foreignIdFor(SellGood::class, 'sell_good_id')->nullable()->default(null);
            // $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_transactions');
    }
};
