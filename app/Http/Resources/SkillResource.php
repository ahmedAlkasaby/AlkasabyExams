<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category_id '=>$this->category->name(),
            'image'=>$this->image,
            'name'=>$this->name(),
            'created_at'=>$this->created_at->format('Y-M-D'),
            'exams'=>ExamResource::collection($this->whenLoaded('exams'))
        ];
    }
}
