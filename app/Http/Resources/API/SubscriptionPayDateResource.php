<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionPayDateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "subscription_name" => $this->subscription_name,
            "cost" => $this->cost,
            "start" => $this->start,
            "payment_date" => $this->paymentDayToDate(),
            "notice_period" => $this->notice_period,
            "categories" => $this->categories->pluck('category_name')
        ]; 
    }
}
