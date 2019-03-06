<?php

namespace Poing\Ylem\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parents = null;
        if ($this->isChild()) {
            $parents = [
                'organizationParentRelationship' => $this->getAncestors(),
            ];
        }

        $org = $this->party;
        //return parent::toArray($request);
        //return 'PartyResource';
        return [
            'id' => $this->party->id,
            'href' => $this->party->href,
            'isLegalEntity' => $this->party->isLegalEntity,
            'type' => $this->party->type,
            'existsDuring' => $org->existsDuring,
            'tradingName' => $this->party->tradingName,
            'nameType' => $this->party->nameType,
        ];

    }
}
