<?php

namespace Poing\Ylem\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndividualResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $traits = CharacteristicResource::collection(
            $this->trait()->get()
        );

        //return parent::toArray($request);
        $data = [
            'id' => $this->id,
            'href' => $this->href,
            'gender' => $this->gender,
            'placeOfBirth' => 'https://example.com/maps/' . uniqid(),
            'countryOfBirth' => $this->countryOfBirth,
            'nationality' => $this->nationality,
            'maritalStatus' => $this->maritalStatus,
            'disability' => 'TBD',
            'birthDate' => $this->birthDate,
            $this->mergeWhen($traits->count(), [
                'characteristic' => $traits,
            ]),
            'title' => $this->title,
            'givenName' => $this->givenName,
            'familyName' => $this->familyName,
            'middleName' => $this->middleName,
            'fullName' => $this->fullName,
            'formattedName' => $this->formattedName,
            'otherName' => 'TBD',
            'location' => 'https://example.com/maps/' . uniqid(),
            'status' => $this->status,

        ];

        $res = array_filter($data, function($value) {
            // returns values that are neither null or empty
            return ($value !== null && $value !== '');
        });

        return $res;

    }
}
