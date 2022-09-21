<?php

namespace App\Http\Resources;

use App\Enums\StatusColor;
use App\Enums\StatusLabel;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public static $wrap = '';

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // TODO: Change ID for UUID (security).
        return [
            'id' => $this->id,
            'date' => $this->created_at->format('F d, Y'),
            'number' => $this->order_number,
            'name' => $this->customer_name,
            'email' => $this->customer_email,
            'phone' => $this->customer_mobile,
            'status' => $this->status,
            'comments' => $this->comments,
            'status_label' => StatusLabel::fromName($this->status),
            'status_color' => StatusColor::fromName($this->status),
        ];
    }
}
