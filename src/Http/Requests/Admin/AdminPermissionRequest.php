<?php namespace Irisit\AuthzLdap\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPermissionRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255|unique:permissions,name,' . $this->id,
            'label' => 'required|max:255',
            'description' => 'required|max:255',
        ];

        return $rules;
    }
}
