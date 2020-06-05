<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        /*return [
            'data11'  => [
                'id'    => $this->id,
                'introduction'    => $this->introduction,
                'notification_count'    => $this->notification_count,
                //'last_actived_at'    => $this->last_actived_at,
            ]
        ];*/
    }
}
