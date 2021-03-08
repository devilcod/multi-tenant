@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="order_code">{{ trans('cruds.order.fields.order_code') }}</label>
                <input class="form-control {{ $errors->has('order_code') ? 'is-invalid' : '' }}" type="text" name="order_code" id="order_code" value="{{ old('order_code', $order->order_code) }}" required>
                @if($errors->has('order_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="table_id">{{ trans('cruds.order.fields.table') }}</label>
                <select class="form-control select2 {{ $errors->has('table') ? 'is-invalid' : '' }}" name="table_id" id="table_id" required>
                    @foreach($tables as $id => $table)
                        <option value="{{ $id }}" {{ (old('table_id') ? old('table_id') : $order->table->id ?? '') == $id ? 'selected' : '' }}>{{ $table }}</option>
                    @endforeach
                </select>
                @if($errors->has('table'))
                    <div class="invalid-feedback">
                        {{ $errors->first('table') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.table_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer">{{ trans('cruds.order.fields.customer') }}</label>
                <input class="form-control {{ $errors->has('customer') ? 'is-invalid' : '' }}" type="text" name="customer" id="customer" value="{{ old('customer', $order->customer) }}" required>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.order.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $order->product->id ?? '') == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.order.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $order->total) }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
