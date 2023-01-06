<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover_image' => $this->image,
            'news_content' => $this->news,
            'created_at' => date_format($this->created_at, "Y/m/d"),
            'author' => $this->author,
            'writer' => $this->whenLoaded('writer'),
            'comments' => $this->whenLoaded('comments', CommentResource::collection($this->comments->loadMissing(['author:id,username,firstname,lastname']))),
            'comment_total' => $this->whenLoaded('comments', function () {
                return $this->comments->count();
            }),
        ];
    }
}
