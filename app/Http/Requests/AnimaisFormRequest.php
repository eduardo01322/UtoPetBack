<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnimaisFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:100|min:1',
            'idade'=>'required|max:20|min:1',
            'sexo' => 'required|max:10|min:1',
            'raca' => 'required|max:100|min:1',
            'descricao' => 'required|max:255|min:5',
            'vacina'=>'required|max:50|min:1',
            'castração'=>'required|max:50|min:5',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return [
            'nome.required' => 'nome do pet é obrigátorio',
            'nome.max' => 'O campo nome deve ter no máximo 100 caractéris',
            'nome.min' => 'O campo nome deve ter no mínimo 1 caractéris',
            
            'idade.required' => 'idade do pet obrigátorio',
            'idade.max' => 'O campo idade deve ter no máximo 100 caractéris',
            'idade.min' => 'O campo idade deve ter no mínimo 1 caractéris',
            
            'sexo.required' => 'sexo do pet obrigátorio',
            'sexo.max' => 'O campo sexo deve ter no máximo 10 caractéris',
            'sexo.min' => 'O campo sexo deve ter no mínimo 1 caractéris',
            
            'raca.required' => 'raca do pet obrigátorio',
            'raca.max' => 'O campo raca deve ter no máximo 100 caractéris',
            'raca.min' => 'O campo raca deve ter no mínimo 1 caractéris',
            
            'descricao.required' => 'descricao do pet obrigátorio',
            'descricao.max' => 'O campo descricao deve ter no máximo 255 caractéris',
            'descricao.min' => 'O campo descricao deve ter no mínimo 3 caractéris',
     
            'vacina.required' => 'vacina do pet obrigátorio',
            'vacina.max' => 'O campo vacina deve ter no máximo 50 caractéris',
            'vacina.min' => 'O campo vacina deve ter no mínimo 3 caractéris',
            
            'castração.required' => 'castração do pet obrigátorio',
            'castração.max' => 'O campo castração deve ter no máximo 50 caractéris',
            'castração.min' => 'O campo castração deve ter no mínimo 5 caractéris',
        ];
    }
}
