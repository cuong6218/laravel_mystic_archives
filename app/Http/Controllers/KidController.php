<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKidRequest;
use App\Http\Services\GradeService;
use App\Http\Services\KidService;
use Illuminate\Http\Request;

class KidController extends Controller
{
    protected $kidService;
    protected $gradeService;
    public function __construct(KidService $kidService, GradeService $gradeService)
    {
        $this->kidService = $kidService;
        $this->gradeService = $gradeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kids = $this->kidService->getAll();
        return view('tables.kids.list', compact('kids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = $this->gradeService->all();
        return view('tables.kids.add', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKidRequest $request)
    {
        $this->kidService->store($request);
        return redirect()->route('kids.index');
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
        $kid = $this->kidService->getKid($id);
        $grades = $this->gradeService->getAll();
        return view('tables.kids.update', compact('kid', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateKidRequest $request, $id)
    {
        $this->kidService->update($request, $id);
        return redirect()->route('kids.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kidService->destroy($id);
        return redirect()->route('kids.index');
    }
}
