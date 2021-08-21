<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    public function index (Request $request)
    {
        $currentPage = $request->current_page ?? 1;

        $query = News::orderBy($request->sort_by ?? 'created_at', $request->order ?? 'desc');

        if (!empty($request->title ?? '')) {
            $query->where('title', 'like', ('%' . ($request->title ?? '') . '%'));
        }

        if (!empty($request->content ?? '')) {
            $query->where('content', 'like', ('%' . ($request->content ?? '') . '%'));
        }

        $allDataCount = $query->count();

        $resultsPerPage = 0;
        $totalPages = 0;

        if ($allDataCount > 0) {
            $resultsPerPage = $request->results_per_page ?? $allDataCount;
            $totalPages = ceil($allDataCount / $resultsPerPage) ?? 0;
        }

        // Only entertain pagination when 'results_per_page' is set
        if ($resultsPerPage != $allDataCount) {
            // Check if current page exceeds total pages, if yes, override to the last available page
            $currentPage = $currentPage > $totalPages ? $totalPages : $currentPage;

            $query->skip(($currentPage - 1) * $resultsPerPage)->take($resultsPerPage);
        }

        $data = $query->get();
        
        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'current_page_results' => $data->count(),
            'results_per_page' => $resultsPerPage,
            'total_pages' => $totalPages,
            'total_results' => $allDataCount
        ]);
    }

    public function store (NewsRequest $request)
    {
        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'is_published' => boolval($request->is_published),
        ]);

        return response()->json([
            'message' => 'News item has now been succesfully created.',
            'data' => $news
        ], 201);
    }
    
    public function show ($newsId)
    {
        $news = News::findOrFail($newsId);

        return response()->json($news);
    }

    public function update (NewsRequest $request, $newsId)
    {
        $news = News::findOrFail($newsId);

        $news->title = $request->title;
        $news->content = $request->content;
        $news->is_published = $request->is_published;

        if (!$news->isDirty()) {
            return response()->json(array('message' => 'No changes made to this news.'), 204);
        } else {
            $news->save();
        }

        return response()->json($news);
    }

    public function destroy ($newsId)
    {
        News::findOrFail($newsId)->delete();

        return response()->json(array('message' => 'News item has now been deleted.'));
    }
}
