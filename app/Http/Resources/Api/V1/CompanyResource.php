<?php

namespace App\Http\Resources\Api\V1;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Company
 */
class CompanyResource extends JsonResource
{
    public static $model = Company::class;
    
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'tax_number' => $this->tax_number,
            'phone' => $this->phone,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}