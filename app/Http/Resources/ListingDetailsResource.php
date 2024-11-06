<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListingDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'role' => $this->role,
            'apply_url' => $this->apply_url,
            'employment_type' => new EmploymentTypeResource($this->employment_type),
            'salary' => $this->salary,
            'description' => $this->description,
            'created_at_attribute' => $this->created_at->format('Y-m-d'),
            'created_at' => $this->created_at->format('F, d Y'),
        ];
    }
}
