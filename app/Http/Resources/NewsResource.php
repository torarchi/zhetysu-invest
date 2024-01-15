<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image_path' => $this->image_path,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'news_category' => $this->news_category,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
