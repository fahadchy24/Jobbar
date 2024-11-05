<?php

namespace App\Http\Requests;

use App\Enums\EmploymentType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:60',
            'slug' => 'required|string',
            'employment_type' => ['required', Rule::enum(EmploymentType::class)],
            'company_name' => 'required|string|max:100',
            'role' => 'required|string|max:50',
            'apply_url' => 'required|url|max:255',
            'company_logo' => 'required|url|max:255',
            'description' => 'required|string',
            'salary' => 'required|string|max:20',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
