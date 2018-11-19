<?php

namespace sillericos\Http\Requests;

use sillericos\Http\Requests\Request;

class SucursalFormRequest extends Request
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
        return [
            'nombre'=>'required|max:50',
            'direccion'=>'required|max:200'
          ];
    }
}
