<?php

namespace Poing\Ylem\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Poing\Ylem\Models\PartyRelationship as PartyRelationship;

class OrganizationResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $parent = PartyOrgResource::collection(
            PartyRelationship::find($this->party->id)
            //->parent()
            ->ancestors()
            ->where('party_type', 'App\\Organization')
            ->get()
        );

        $sibling = PartyOrgResource::collection(
            PartyRelationship::find($this->party->id)
            ->siblings()
            ->where('party_type', 'App\\individual')
            ->get()
        );

        $child = PartyOrgResource::collection(
            PartyRelationship::find($this->party->id)
            ->immediateDescendants()
            ->where('party_type', 'App\\Organization')
            ->get()
        );

        $traits = CharacteristicResource::collection(
            $this->trait()->get()
        );



        $data = [
            'id' => $this->id,
            'href' => $this->href,
            'isLegalEntity' => $this->isLegalEntity,
            'type' => $this->type,
            //'party' => $this->party,
            /*
             * Calling $this->existsDuring direclty breaks array_filter()
             * Using TimePeriodResource to strip null values before
             * presenting the relationship object.
             * mergeWhen() prevents unassigned items from being being
             * populated as null.
             */
            $this->mergeWhen(isset($this->existsDuring), [
                'existsDuring' => new TimePeriodResource($this->existsDuring),
            ]),
            'tradingName' => $this->tradingName,
            'nameType' => $this->nameType,
            'status' => $this->status,

            $this->mergeWhen($traits->count(), [
                'characteristic' => $traits,
            ]),

            //'relatedParty' => $this->party->children()->with('party')->get(),

            $this->mergeWhen($sibling->count(), [
                'relatedParty' => $sibling,
            ]),

            $this->mergeWhen($parent->count(), [
                'organizationParentRelationship' => $parent,
            ]),

            $this->mergeWhen($child->count(), [
                'OrganizationChildRelationship' => $child,
            ]),


        ];

        /*
         * Removing null and empty values from the returned resource.
         */
        $res = array_filter($data, function($value) {
            // returns values that are neither null or empty
            return ($value !== null && $value !== '');
        });

        return $res;
    }

}

