<?php

namespace App\Http\Resources\Api;

use App\Models\Position;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $position = new PositionsResource($this->positions);
        return [
            'success' => true,
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'position' => $position->title,
                'position_id' => $this->position_id,
                'photo' => $this->photo,
            ]
        ];
    }
}
