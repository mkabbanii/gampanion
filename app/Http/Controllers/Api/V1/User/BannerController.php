<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Admin\BannerResource;
use Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class BannerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $data =[];
        $banners = Banner::select('id')->get();
        foreach ($banners as $banner) {
            $files = $banner->getMedia('banners');
            foreach ($files as $item) {
                $banner->url= $item->getUrl();
            }
            $item=(object)[];
            $item->id = $banner->id;
            $item->url = $banner->url;
            $data[]=$item;
        }
        return new BannerResource($data);
    }


}
