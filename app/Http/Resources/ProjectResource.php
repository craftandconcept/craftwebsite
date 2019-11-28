<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Creator;
use App\Country;
class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'creator_id	' => $this->creator_id,
            'country_id' => $this->country_id,
            'main_image' => $this->main_image,
            'images' => $this->photos,
            'category_ids' => $this->categories->pluck('id'),
            'category_name' => $this->categories->pluck('category_name'),
            'country_name' => Country::first()->where('id',$this->country_id)->value('country_name'),
            'creator_name' => Creator::first()->where('id',$this->creator_id)->value('creator_name'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}