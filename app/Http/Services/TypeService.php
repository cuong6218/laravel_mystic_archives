<?php


namespace App\Http\Services;


use App\Http\Repositories\TypeRepository;
use App\Type;
use Illuminate\Http\Request;

class TypeService
{
    protected $typeRepo;
    public function __construct(TypeRepository $typeRepo)
    {
        $this->typeRepo = $typeRepo;
    }
    public function getAll()
    {
        return $this->typeRepo->getAll();
    }
    public function all()
    {
        return $this->typeRepo->all();
    }
    public function store(Request $request)
    {
        $type = new Type();
        $type->name = $request->name;
        $this->typeRepo->save($type);
    }
    public function getType($id)
    {
        return $this->typeRepo->getType($id);
    }
    public function update(Request $request, $id)
    {
        $type = $this->typeRepo->getType($id);
        $type->name = $request->name;
        $this->typeRepo->save($type);
    }
    public function destroy($id)
    {
        $this->typeRepo->destroy($id);
    }
}
