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
        $limit = $request->input('items') ?? 20;
        
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
        $news = News::create($data);

        return $news;
    }

    public function update(NewsRequest $request, $id)
    {
        $data = $request->validated();

        $news = News::findOrFail($id);
        $news->update($data);

        return $news;
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(['success' => true], 200);
    }
}
