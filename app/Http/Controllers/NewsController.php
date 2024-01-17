<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsIndexRequest;

class NewsController extends Controller
{
    public function index(NewsIndexRequest $request)
    {
        $limit = isset($request->limit) ? $request->limit : 20;

        $news = News::paginate($limit);

        return $news;
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return $news;
    }
    
    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        News::create($data);

        return response()->json(['success' => true]);
    }

    public function update(NewsRequest $request, $id)
    {
        $data = $request->validated();

        $news = News::findOrFail($id);

        $news->update($data);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        return response()->json(['success' => true]);
    }
}
