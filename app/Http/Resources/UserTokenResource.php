<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'name'=>$this->name,
            // 'role'=>$this->role,
            // 'email'=>$this->email,
            $this->merge(new UserResource($this)),
            'access_token' => $this->access_token,
        ];
    }
}
