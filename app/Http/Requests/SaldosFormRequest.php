<?php

namespace sillericos\Http\Requests;

use sillericos\Http\Requests\Request;

class SaldosFormRequest extends Request
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
            
                //'idproducto'=>'required',
                /*'fecha'=>'required',
                'idventa'=>'required',
                'ingreso'=>'required',
                'tipoDoc'=>'required',
                'numDoc'=>'required'
                
                //'estado'=>'',*/
                
    
            
        ];
    }
}
