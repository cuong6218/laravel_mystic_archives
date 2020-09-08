<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Http\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $typeService;
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->typeService->getAll();
        return view('tables.types.list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeRequest $request)
    {
        $this->typeService->store($request);
        return redirect()->route('types.index');
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
        $type = $this->typeService->getType($id);
        return view('tables.types.update', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTypeRequest $request, $id)
    {
        $this->typeService->update($request, $id);
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->typeService->destroy($id);
        return redirect()->route('types.index');
    }
}
