<?php

namespace Modules\Overview\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Overview\Entities\OverviewParam as OverviewParam;

class OverviewController extends Controller
{

    /**
     * Display the module's index page
     * @return Renderable
     */
    public function index()
    {
        return view('overview::index', ['overviewParams' => OverviewParam::withTrashed()->get()]);
    }

    /**
     * Display the module's master resource index (frontend)
     * @return Renderable
     */
    public function frontend()
    {
        $entries = \Overview::all();
        return view('overview::master.index', ['entries' => $entries]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('overview::backend.create', ['crud' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
           'slug' => 'required|unique:overviews|max:255',
           'title' => 'required|unique:overviews|max:255',
           'lead' => 'required',
           'body' => 'required',
           'user_id' => 'int',
           'photo' => 'image|mimetypes:image/jpeg|max:2048',
           'meta_title' => 'required|unique:overviews|max:120',
           'meta_description' => 'required|unique:overviews|max:150',
           'meta_keywords' => 'required|unique:overviews|max:300',
        ]);
        
        if(!empty($request['photo']))
        {
            \Overview::create($request->all())->addMedia($request['photo'])->toMediaCollection('overviews');
            return $this->index();
        }
        \Modules\Core\Entities\Page::create($request->all());
        return $this->index();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Overview overview
     * @return \Illuminate\Http\Response
     */
    public function show(Overview $overview)
    {
        return view('overview::master.show', ['crud' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Overview $LOWER_NAME
     * @return \Illuminate\Http\Response
     */
    public function edit(Overview $overview)
    {
        return view('overview::backend.edit', ['crud' => 'edit', 'overview' => $overview]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Overview $LOWER_NAME
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Overview $overview)
    {
        $overview->update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Overview $LOWER_NAME
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overview $overview)
    {
        return $this->index();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function setup()
    {
        return view('overview::setup.index');
    } 
}