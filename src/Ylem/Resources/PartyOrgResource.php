<?php

namespace Poing\Ylem\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartyOrgResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $data = [

            'relationshipType' => $this->party->type ?? 'Employee',
            'name' => $this->party->tradingName ?? $this->party->name,
            'id' => $this->party->id,
            'href' => $this->party->href,
            //'isLegalEntity' => $this->party->isLegalEntity,
            /*
             * Calling $this->existsDuring direclty breaks array_filter()
             * Using TimePeriodResource to strip null values before
             * presenting the relationship object.
             * mergeWhen() prevents unassigned items from being being
             * populated as null.
             */
            /*$this->mergeWhen(isset($this->party->existsDuring), [
                'existsDuring' =>
                 new TimePeriodResource($this->party->existsDuring),
            ]),*/
            /*'tradingName' => $this->party->tradingName,
            'nameType' => $this->party->nameType,
            'status' => $this->party->status,*/

            //'relatedParty' => $this->party->children()->with('party')->get(),
            //'OrganizationChildRelationship' => OrganizationResource::collection(\App\PartyRelationship::find($this->id)->party()->get()),
        ];

        /*
         * Removing null and empty values from the returned resource.
         */
        $res = array_filter($data, function($value) {
            // returns values that are neither null or empty
            return ($value !== null && $value !== '');
        });

        return $res;
        //return $this->party;
    }

}

