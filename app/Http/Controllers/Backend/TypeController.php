<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TypeUpdateRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    protected $type;

    /**
     * create Dependency Injection user
     *
     * @param Type $type
     */
    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $types = $this->type->withTrashed()->get();
        return view('backend.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $type = $this->type->create($params);
        if ($type) {
            $type->update($params);
            return redirect()->route('types.show', $type->id);
        } else {
            return redirect(url()->previous());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $type = Type::with('events')->withTrashed()->findOrFail($id);
        return view('backend.types.detail', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type = $this->type->withTrashed()->findOrFail($id);
        return view('backend.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Routing\Redirector
     */
    public function update(TypeUpdateRequest $request, $id)
    {
        $params = $request->all();
        $type = $this->type->findOrFail($id);
        if ($type) {
            $type->update($params);
            return redirect()->route('types.show', $type->id);
        } else {
            return redirect(url()->previous());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $type = $this->type->find($id);
        return redirect(route('types.index'));
    }

    /**
     * restore the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(Request $request)
    {
        $this->type->withTrashed()->find($request->id)->restore();
        return redirect(route('types.show', $request->id));
    }
}
