<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySystemStringRequest;
use App\Http\Requests\StoreSystemStringRequest;
use App\Http\Requests\UpdateSystemStringRequest;
use App\Models\SystemString;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SystemStringsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('system_string_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemStrings = SystemString::all();

        return view('frontend.systemStrings.index', compact('systemStrings'));
    }

    public function create()
    {
        abort_if(Gate::denies('system_string_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.systemStrings.create');
    }

    public function store(StoreSystemStringRequest $request)
    {
        $systemString = SystemString::create($request->all());

        return redirect()->route('frontend.system-strings.index');
    }

    public function edit(SystemString $systemString)
    {
        abort_if(Gate::denies('system_string_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.systemStrings.edit', compact('systemString'));
    }

    public function update(UpdateSystemStringRequest $request, SystemString $systemString)
    {
        $systemString->update($request->all());

        return redirect()->route('frontend.system-strings.index');
    }

    public function show(SystemString $systemString)
    {
        abort_if(Gate::denies('system_string_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.systemStrings.show', compact('systemString'));
    }

    public function destroy(SystemString $systemString)
    {
        abort_if(Gate::denies('system_string_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemString->delete();

        return back();
    }

    public function massDestroy(MassDestroySystemStringRequest $request)
    {
        SystemString::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
