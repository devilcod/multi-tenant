<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'order_code' => [
                'string',
                'min:1',
                'required',
            ],
            'table_id'   => [
                'required',
                'integer',
            ],
            'customer'   => [
                'string',
                'required',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity'   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total'      => [
                'required',
            ],
        ];
    }
}