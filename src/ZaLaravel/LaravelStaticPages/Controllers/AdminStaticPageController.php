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
        return view('laravel-static-pages::create',
            ['action' => 'create', 'page' => $page]);
    }

    /**
     * @param StaticPagesInterface $page
     * @param StaticPageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaticPagesInterface $page, StaticPageRequest $request)
    {
        $input = $request->all();
        $page->fill($input);
        $page->save();

        return redirect()->route('admin.page.index');
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
        $input = $request->all();
        $page->fill($input);
        $page->save();

        return redirect()->route('admin.page.index');
    }

    /**
     * @param StaticPagesInterface $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StaticPagesInterface $page)
    {
        $page->delete();

        return redirect()->route('admin.page.index');
    }

}
