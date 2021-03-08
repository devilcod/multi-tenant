<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTableRequest;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Table;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tables = Table::with(['team'])->get();

        $teams = Team::get();

        return view('admin.tables.index', compact('tables', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('table_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tables.create', compact('teams'));
    }

    public function store(StoreTableRequest $request)
    {
        $table = Table::create($request->all());

        return redirect()->route('admin.tables.index');
    }

    public function edit(Table $table)
    {
        abort_if(Gate::denies('table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $table->load('team');

        return view('admin.tables.edit', compact('table'));
    }

    public function update(UpdateTableRequest $request, Table $table)
    {
        $table->update($request->all());

        return redirect()->route('admin.tables.index');
    }

    public function show(Table $table)
    {
        abort_if(Gate::denies('table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $table->load('team');

        return view('admin.tables.show', compact('table'));
    }

    public function destroy(Table $table)
    {
        abort_if(Gate::denies('table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $table->delete();

        return back();
    }

    public function massDestroy(MassDestroyTableRequest $request)
    {
        Table::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}