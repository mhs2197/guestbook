<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SignatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
       return[
           'id' => $this->id,
           'name' => $this->name,
           'avatar' => $this->avatar,
           'body' => $this->body,
           'date' => $this->created_at->diffForHumans()
       ];
    }
    /**
     * Get the user Gravatar by their email address.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5($this->email));
    }
}
