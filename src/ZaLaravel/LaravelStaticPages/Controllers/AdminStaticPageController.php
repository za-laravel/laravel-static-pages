<?php

namespace ZaLaravel\LaravelStaticPages\Controllers;

use App\Http\Controllers\Controller;
use ZaLaravel\LaravelStaticPages\Models\Interfaces\StaticPagesInterface;
use ZaLaravel\LaravelStaticPages\Requests\StaticPageRequest;


/**
 * Class AdminStaticPageController
 * @package ZaLaravel\LaravelStaticPages\Controllers
 */
class AdminStaticPageController extends Controller
{

    /**
     * @param StaticPagesInterface $page
     * @return \Illuminate\View\View
     */
    public function index(StaticPagesInterface $page)
    {
        $pages = $page::orderBy('id', 'desc')->paginate(10);

        return view('laravel-static-pages::index', compact('pages'));
    }


    /**
     * @param StaticPagesInterface $page
     * @return \Illuminate\View\View
     */
    public function create(StaticPagesInterface $page)
    {
        return view('laravel-static-pages::create', ['action' => 'create', 'page' => $page]);
    }

    /**
     * @param StaticPagesInterface $page
     * @param StaticPageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaticPagesInterface $page, StaticPageRequest $request)
    {
        $data = $request->all();
        $this->persist($page, $data, 'store');

        return redirect()->route('laravel-static-page::index', ['id' => $page->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param StaticPagesInterface $page
     * @return \Illuminate\View\View
     */
    public function edit(StaticPagesInterface $page)
    {
        return view('laravel-static-pages::edit', ['action' => 'edit', 'page' => $page]);
    }

    /**
     * @param StaticPagesInterface $page
     * @param StaticPageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StaticPagesInterface $page, StaticPageRequest $request)
    {
        $data = $request->all();
        $this->persist($page, $data, 'update');

        return redirect()->route('laravel-static-pages::edit', ['id' => $page->id]);
    }

    /**
     * @param StaticPagesInterface $page
     * @param $data
     * @param $caller
     */
    protected function persist(StaticPagesInterface $page, $data, $caller)
    {
        $lang = ('store' === $caller) ? 'ru' : $data['lang'];

        $data[$lang] = [
            'title' => $data['title'],
            'article' => $data['article'],
            'description' => $data['description'],
            'tags' => $data['tags']
        ];

        unset($data['title'], $data['article'],
            $data['description'], $data['tags']);

        $page->fill($data);
        $page->save();
    }

    /**
     * @param StaticPagesInterface $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StaticPagesInterface $page)
    {
        $page->delete();

        return redirect()->route('laravel-static-pages::index');
    }

}
