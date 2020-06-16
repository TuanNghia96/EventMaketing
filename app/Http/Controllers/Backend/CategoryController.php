<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $category;

    /**
     * create Dependency Injection user
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->category->withTrashed()->get();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(CategoryStoreRequest $request)
    {
        $params = $request->all();
        $category = $this->category->create($params);
        if ($category) {
            $category->update($params);
            return redirect()->route('categories.show', $category->id);
        } else {
            return redirect(url()->previous());
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category = $this->category->withTrashed()->with('events')->findOrFail($id);
        return view('backend.categories.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->category->withTrashed()->findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Routing\Redirector
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $params = $request->all();
        $category = $this->category->findOrFail($id);
        if ($category) {
            $category->update($params);
            return redirect()->route('categories.show', $category->id);
        } else {
            return redirect(url()->previous());
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        if ($category->disable()) {
            return redirect(route('categories.show', $id));
        }
        return redirect(route('categories.index'));
    }

    /**
     * restore the specified category from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(Request $request)
    {
        $category = $this->category->find($request->id);
        if ($category->enable()) {
            return redirect(route('categories.show', $request->id));
        }
        return redirect(route('categories.index'));
    }
}
