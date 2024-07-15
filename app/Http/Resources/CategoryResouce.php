<?php

namespace App\Http\Resources;

use App\Http\Resources\SkillResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name_ar'=>json_decode($this->name)->ar,
            'name_en'=>json_decode($this->name)->en,
            'skills'=>SkillResource::collection($this->whenLoaded('skills')),
        ];
    }
}
