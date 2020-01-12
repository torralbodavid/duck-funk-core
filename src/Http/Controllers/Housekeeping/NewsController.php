<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Housekeeping;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Http\Request\Housekeeping\News\NewsStoreRequest;
use Torralbodavid\DuckFunkCore\Models\Housekeeping\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('housekeeping::news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NewsStoreRequest $request)
    {
        $validated = $request->validated();

        $news = new News;
        $news->title = $validated['title'];
        $news->subtitle = $validated['subtitle'];
        $news->body = $validated['body'];
        $news->categories = $validated['allCategories'];
        $news->draft = 0;
        $news->author = core()->user()->id;
        $news->published_at = $validated['publish_date'];

        try {
            $news->saveOrFail();
        } catch (\Throwable $e) {
            return response()->json([
                'message' => "Ha sucedido un error {$e->getCode()}",
                'error' => true,
            ]);
        }

        return response()->json([
            'message' => 'Noticia publicada correctamente',
            'error' => false,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
