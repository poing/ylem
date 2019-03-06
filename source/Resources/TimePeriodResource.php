<?php

namespace Poing\Ylem\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimePeriodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*
         * Removing null values from the returned resource.
         */
        return array_filter(parent::toArray($request));
    }
}
