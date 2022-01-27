<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', static function (Blueprint $table): void {
            $table->id();
            $table->string('name', 255);
        });

        Schema::create('company_user', static function (Blueprint $table): void {
            $table
                ->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table
                ->foreignId('company_id')
                ->references(
                    'id'
                )->on('companies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->primary(['user_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_user');
    }
}
