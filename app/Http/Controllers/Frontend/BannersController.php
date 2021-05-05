<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBannerRequest;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BannersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banners = Banner::with(['media'])->get();

        return view('frontend.banners.index', compact('banners'));
    }

    public function create()
    {
        abort_if(Gate::denies('banner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {
        $banner = Banner::create($request->all());

        foreach ($request->input('banners', []) as $file) {
            $banner->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('banners');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $banner->id]);
        }

        return redirect()->route('frontend.banners.index');
    }

    public function edit(Banner $banner)
    {
        abort_if(Gate::denies('banner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $banner->update($request->all());

        if (count($banner->banners) > 0) {
            foreach ($banner->banners as $media) {
                if (!in_array($media->file_name, $request->input('banners', []))) {
                    $media->delete();
                }
            }
        }

        $media = $banner->banners->pluck('file_name')->toArray();

        foreach ($request->input('banners', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $banner->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('banners');
            }
        }

        return redirect()->route('frontend.banners.index');
    }

    public function show(Banner $banner)
    {
        abort_if(Gate::denies('banner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.banners.show', compact('banner'));
    }

    public function destroy(Banner $banner)
    {
        abort_if(Gate::denies('banner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banner->delete();

        return back();
    }

    public function massDestroy(MassDestroyBannerRequest $request)
    {
        Banner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('banner_create') && Gate::denies('banner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Banner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
