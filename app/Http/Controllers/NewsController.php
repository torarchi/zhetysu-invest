<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsIndexRequest;
use App\Http\Resources\NewsResource; 

class NewsController extends Controller
{
    public function index(NewsIndexRequest $request)
    {
        $items = $request->input('items') ?? 20;
        
        $news = News::paginate($items);
        return NewsResource::collection($news);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return new NewsResource($news);
    }
    
    public function store(NewsRequest $request)
    {
        $data = $request->validated();
        $news = News::create($data);

        return new NewsResource($news);
    }

    public function update(NewsRequest $request, $id)
    {
        $data = $request->validated();

        $news = News::findOrFail($id);
        $news->update($data);

        return new NewsResource($news);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(['success' => true], 200);
    }
}
