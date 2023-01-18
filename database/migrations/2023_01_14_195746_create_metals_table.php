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
        Schema::create('metals', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->foreignId('project_id')->index()->constrained('projects');
            $table->string('quantity_per_unit')->nullable();
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('equipment_code')->nullable();
            $table->string('title_purchase')->nullable();
            $table->string('measure_unit_project');
            $table->decimal('quantity_project', 13, 3);
            $table->string('measure_unit_change_in_the_project')->nullable();
            $table->decimal('quantity_change_in_the_project')->nullable();
            $table->string('measure_unit_purchase')->nullable();
            $table->decimal('quantity_purchase', 13, 3)->nullable();
            $table->string('measure_unit_delivered')->nullable();
            $table->string('quantity_delivered')->nullable();
            $table->decimal('tender_price_with_v_a_t', 13, 2)->nullable();
            $table->decimal('tender_sum_with_v_a_t', 13, 2)->nullable();
            $table->decimal('purchase_price_with_v_a_t', 13, 2)->nullable();
            $table->decimal('purchase_sum_with_v_a_t', 13, 2)->nullable();
            $table->string('contract')->nullable();
            $table->string('specification')->nullable();
            $table->string('supplier')->nullable();
            $table->string('producer')->nullable();
            $table->string('bill')->nullable();
            $table->date('bill_date')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->date('order_date')->nullable();
            $table->date('planned_date_of_shipment')->nullable();
            $table->integer('time_on_the_way')->nullable();
            $table->date('real_date_of_shipment')->nullable();
            $table->date('planned_delivery_date')->nullable();
            $table->date('real_delivery_date')->nullable();
            $table->date('contract_delivery_date')->nullable();
            $table->integer('reserve_without_delivery')->nullable();
            $table->string('note')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('invoice')->nullable();
            $table->string('consignment_note')->nullable();
            $table->date('consignment_note_date')->nullable();
            $table->string('type_of_paint')->nullable();
            $table->decimal('amount_of_paint', 13, 2)->nullable();

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
        Schema::dropIfExists('metals');
    }
};
