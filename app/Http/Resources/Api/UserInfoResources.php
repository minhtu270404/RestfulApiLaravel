<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'user_id'=>$this->user_id,
        'code'=>$this->code,
        'gender'=>$this->gender,
        'birthdate'=>$this->birthdate,
        'birth_place'=>$this->birth_place,
        'national'=>$this->national,
        'religion'=>$this->religion,
        'hometown'=>$this->hometown,
        'identily'=>$this->identily,
        'identily_date'=>$this->identily_date,
        'identily_place'=>$this->identily_place,
        'tax_code'=>$this->tax_code,
        'phone'=>$this->phone,
        'address'=>$this->address,
        'household'=>$this->household,
        'bank_account'=>$this->bank_account,
        'bank'=>$this->bank,
        'start_working_date'=>$this->start_working_date,
        'working_place'=>$this->working_place,
        'note'=>$this->note,
        'company_name'=>$this->company_name,
        'department'=>$this->department,
        'unit_name'=>$this->unit_name,
        'headquater_name'=>$this->headquater_name,
        'position_name'=>$this->position_name,
        'concurent_position_name'=>$this->concurent_position_name,
        ];
    }
}
