@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.table.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.table.fields.id') }}
                        </th>
                        <td>
                            {{ $table->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.table.fields.name') }}
                        </th>
                        <td>
                            {{ $table->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.table.fields.capacity') }}
                        </th>
                        <td>
                            {{ $table->capacity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.table.fields.status') }}
                        </th>
                        <td>
                            {{ $table->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection