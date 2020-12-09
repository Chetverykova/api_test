<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'content' => $this->content,
            'created_at_ts' => $this->created_at,
            'image_url' => $this->image->url,
            //6.2 retun number of comments
            'count_of_comment' => count($this->comments),
        ];
    }
}
