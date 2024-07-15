<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Name_ar'=>json_decode($this->name)->ar,
            'Name_en'=>json_decode($this->name)->en,
            'Image'=>'uploads/'.$this->image,
            'duration_minates'=>$this->duration_minates,
            'difficulty'=>$this->difficulty,
            'questions'=>$this->questions,
            'created_at'=>$this->created_at->format('Y-M-D'),
            'users_count'=>$this->users->count(),
            'ExamQuestions'=>QuestionResource::collection($this->whenLoaded('questionsExam'))
        ];
    }
}
