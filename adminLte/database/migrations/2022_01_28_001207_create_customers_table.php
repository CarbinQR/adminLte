<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('email', 255)->unique();
            $table->string('phone_number', 20);
        });

        Schema::create('company_customer', static function (Blueprint $table): void {
            $table
                ->foreignId('customer_id')
                ->references('id')
                ->on('customers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table
                ->foreignId('company_id')
                ->references(
                    'id'
                )->on('companies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->primary(['customer_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('company_client');
    }
}
