<?php

namespace Poing\Ylem\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PartyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        //return 'PartyCollection';
        //return dd($request);
        return $this;
    }
}
