<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKitchenRequest;
use App\Http\Requests\StoreKitchenRequest;
use App\Http\Requests\UpdateKitchenRequest;
use App\Models\Kitchen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KitchenController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('kitchen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Kitchen::with(['orders', 'team'])->select(sprintf('%s.*', (new Kitchen)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'kitchen_show';
                $editGate      = 'kitchen_edit';
                $deleteGate    = 'kitchen_delete';
                $crudRoutePart = 'kitchens';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kitchens.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kitchen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kitchens.create');
    }

    public function store(StoreKitchenRequest $request)
    {
        $kitchen = Kitchen::create($request->all());

        return redirect()->route('admin.kitchens.index');
    }

    public function edit(Kitchen $kitchen)
    {
        abort_if(Gate::denies('kitchen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kitchen->load('orders', 'team');

        return view('admin.kitchens.edit', compact('kitchen'));
    }

    public function update(UpdateKitchenRequest $request, Kitchen $kitchen)
    {
        $kitchen->update($request->all());

        return redirect()->route('admin.kitchens.index');
    }

    public function show(Kitchen $kitchen)
    {
        abort_if(Gate::denies('kitchen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kitchen->load('orders', 'team');

        return view('admin.kitchens.show', compact('kitchen'));
    }

    public function destroy(Kitchen $kitchen)
    {
        abort_if(Gate::denies('kitchen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kitchen->delete();

        return back();
    }

    public function massDestroy(MassDestroyKitchenRequest $request)
    {
        Kitchen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}