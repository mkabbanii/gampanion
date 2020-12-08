<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnnouncementRequest;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Announcement;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnnouncementsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('announcement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $announcements = Announcement::all();

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        abort_if(Gate::denies('announcement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.announcements.create', compact('users'));
    }

    public function store(StoreAnnouncementRequest $request)
    {
        $announcement = Announcement::create($request->all());

        return redirect()->route('admin.announcements.index');
    }

    public function edit(Announcement $announcement)
    {
        abort_if(Gate::denies('announcement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $announcement->load('user');

        return view('admin.announcements.edit', compact('users', 'announcement'));
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->update($request->all());

        return redirect()->route('admin.announcements.index');
    }

    public function show(Announcement $announcement)
    {
        abort_if(Gate::denies('announcement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $announcement->load('user');

        return view('admin.announcements.show', compact('announcement'));
    }

    public function destroy(Announcement $announcement)
    {
        abort_if(Gate::denies('announcement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $announcement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnnouncementRequest $request)
    {
        Announcement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
