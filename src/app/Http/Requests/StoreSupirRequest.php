<?php

namespace App\Http\Requests;

use App\Models\Supir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupirRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supir_create');
    }

    public function rules()
    {
        return [
            'supirname' => [
                'string',
                'required',
            ],
            'Id_pegawai' => [
                'string',
                'required',
            ],
            'umur' => [
                'string',
                'required',
            ],
            'jenis_kelamin' => [
                'string',
                'required',
            ],
        ];
    }
}
