<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Carbon;
use App\Http\Requests\Admin\ImageRequest;
use App\Http\Requests\Admin\UpdateImageRequest;
use App\Http\Resources\Admin\Image as ImageResource;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function index()
    {
        $images = Image::paginate();
        return view('admin.image.index')->with(['images' => $images]);
    }

    public function create()
    {
        return view('admin.image.create');
    }

    public function saveNew(ImageRequest $request)
    {
        $extension = $request->image->extension();
        $hash = md5(Carbon::now()->toDateTimeString().$request->image->path());
        $fileName =  $hash.'.'.$extension;
        $path = $request->image->storeAs('public/images', $fileName);
        $hexColor = Image::getAverageColor($request->image);

        $image = new Image();
        $image->title = $request->input('title');
        $image->path = $fileName;
        $image->average_color = $hexColor;
        $image->save();
        return redirect()->route('admin.image.index');
    }

    public function edit(Image $image)
    {
        return view('admin.image.create')->with(['image' => $image]);
    }

    public function update(Image $image, UpdateImageRequest $request)
    {
        $image->title = $request->input('title');
        $image->save();
        return redirect()->route('admin.image.index');
    }

    public function delete(Image $image)
    {
        Storage::disk('public')->delete('images/' . $image->path);
        $image->delete();

        return response()->json(new ImageResource($image));
    }
}
