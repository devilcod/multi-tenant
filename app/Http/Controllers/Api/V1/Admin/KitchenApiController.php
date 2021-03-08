<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKitchenRequest;
use App\Http\Requests\UpdateKitchenRequest;
use App\Http\Resources\Admin\KitchenResource;
use App\Models\Kitchen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KitchenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kitchen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KitchenResource(Kitchen::with(['orders', 'team'])->get());
    }

    public function store(StoreKitchenRequest $request)
    {
        $kitchen = Kitchen::create($request->all());
        $kitchen->orders()->sync($request->input('orders', []));

        return (new KitchenResource($kitchen))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Kitchen $kitchen)
    {
        abort_if(Gate::denies('kitchen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KitchenResource($kitchen->load(['orders', 'team']));
    }

    public function update(UpdateKitchenRequest $request, Kitchen $kitchen)
    {
        $kitchen->update($request->all());
        $kitchen->orders()->sync($request->input('orders', []));

        return (new KitchenResource($kitchen))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Kitchen $kitchen)
    {
        abort_if(Gate::denies('kitchen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kitchen->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}