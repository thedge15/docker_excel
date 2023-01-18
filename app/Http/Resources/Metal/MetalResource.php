<?php

namespace App\Http\Resources\Metal;

use App\Http\Resources\Project\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MetalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
//            'id' => $this->id,
//            'type' => new ProjectResource($this->project),
            'id' => $this->id,
            'number' => $this->number,
            'project' => new ProjectResource($this->project),
            'quantity_per_unit' => $this->quantity_per_unit,
            'title' => $this->title,
            'type' => $this->type,
            'equipment_code' => $this->equipment_code,
            'title_purchase' => $this->title_purchase,
            'measure_unit_project' => $this->measure_unit_project,
            'quantity_project' => $this->quantity_project,
            'measure_unit_change_in_the_project' => $this->measure_unit_change_in_the_project,
            'quantity_change_in_the_project' => $this->quantity_change_in_the_project,
            'measure_unit_purchase' => $this->measure_unit_purchase,
            'quantity_purchase' => $this->quantity_purchase,
            'measure_unit_delivered' => $this->measure_unit_delivered,
            'quantity_delivered' => $this->quantity_delivered,
            'tender_price_with_v_a_t' => $this->tender_price_with_v_a_t,
            'tender_sum_with_v_a_t' => $this->tender_sum_with_v_a_t,
            'purchase_price_with_v_a_t' => $this->purchase_price_with_v_a_t,
            'purchase_sum_with_v_a_t' => $this->purchase_sum_with_v_a_t,
            'contract' => $this->contract,
            'specification' => $this->specification,
            'supplier' => $this->supplier,
            'producer' => $this->producer,
            'bill' => $this->bill,
            'bill_date' => $this->bill_date,
            'delivery_time' => $this->delivery_time,
            'order_date' => $this->order_date,
            'planned_date_of_shipment' => $this->planned_date_of_shipment,
            'time_on_the_way' => $this->time_on_the_way,
            'real_date_of_shipment' => $this->real_date_of_shipment,
            'planned_delivery_date' => $this->planned_delivery_date,
            'real_delivery_date' => $this->real_delivery_date,
            'contract_delivery_date' => $this->contract_delivery_date,
            'reserve_without_delivery' => $this->reserve_without_delivery,
            'note' => $this->note,
            'delivery_address' => $this->delivery_address,
            'invoice' => $this->invoice,
            'consignment_note' => $this->consignment_note,
            'consignment_note_date' => $this->consignment_note_date,
            'type_of_paint' => $this->type_of_paint,
            'amount_of_paint' => $this->amount_of_paint,
            'created_at' => $this->created_at,
       ];
    }
}
