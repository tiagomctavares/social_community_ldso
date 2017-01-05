<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\NewsEntry;
use Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsEntry::with('likes')->withCount('likes')->orderBy('created_at', 'desc')->paginate(self::DEFAULT_PAGINATION);

        return view('news.index', compact('news'));
    }

    public function show(NewsEntry $newsEntry)
    {
        return view('news.show', compact('newsEntry', 'comments'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        $news = new NewsEntry();

        if ($request->file('image')) {

            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('images/news/' . $filename));
            $news->img_name = $filename;
        }

        $news->description = $request->description;
        $news->title = $request->title;
        $news->author()->associate(auth()->user());

        $news->save();

        return redirect()->action('NewsController@show', $news);

    }
}
