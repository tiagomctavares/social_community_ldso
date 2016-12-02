<?php

namespace App\Http\Controllers;

use App\IdeaEntry;
use Illuminate\Http\Request;

class IdeaEntriesController extends Controller
{
    /**
     * Directs to the view with all user Ideas requests
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ideas = IdeaEntry::paginate(self::DEFAULT_PAGINATION);

        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show a selected idea and  possibly current state of the votes
     * if user did not vote, voting is enabled
     * @param IdeaEntry $idea_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($idea_id)
    {
        $ideaEntry = IdeaEntry::with('pollAnswers', 'likes')
            ->where('id', $idea_id)->first();

        if(!$ideaEntry) redirect()->back();

        return view('ideas.show', compact('ideaEntry'));
    }

    public function create()
    {
        return view('ideas.create');
    }
}
