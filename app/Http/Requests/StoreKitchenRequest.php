<?php

namespace App\Http\Requests;

use App\Models\Kitchen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKitchenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kitchen_create');
    }

    public function rules()
    {
        return [];
    }
}