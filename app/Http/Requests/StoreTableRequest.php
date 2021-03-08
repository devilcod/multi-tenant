<?php

namespace App\Http\Requests;

use App\Models\Table;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('table_create');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'min:1',
                'required',
            ],
            'capacity' => [
                'string',
                'min:1',
                'required',
            ],
            'status'   => [
                'string',
                'required',
            ],
            'team_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}