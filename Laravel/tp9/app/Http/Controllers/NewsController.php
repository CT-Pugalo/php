<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsList = News::orderBy('date', 'desc')->take(10)->get();
        return view('news.list', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect('login');
        }else{
            return view('news.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $request->validated();
        $news = News::make($request->input());
        $news->user()->associate(Auth::id());
        $news->save();
        return redirect()->route('news.show', ['news' => $news]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('news.show', ['news' => News::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()){
            return redirect('login');
        }else{
            return view('news.edit', ['news' => News::findOrFail($id)]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreNewsRequest  $request
     * @param App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsRequest $request, News $news)
    {
        if(!Auth::check()){
            return redirect('login');
        }else{
            $request->validated();
            $news->update($request->input());
            return redirect()->route('news.show', ['news' => $news]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return redirect('login');
        }else{
            $news = News::findOrFail($id);
            $news->delete();
            return redirect()->route('news.index');
        }
    }
}
