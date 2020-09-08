<?php


namespace App\Http\Services;


use App\Http\Repositories\KidRepository;
use App\Kid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KidService
{
    protected $kidRepo;
    public function __construct(KidRepository $kidRepo)
    {
        $this->kidRepo = $kidRepo;
    }
    public function getAll()
    {
        return $this->kidRepo->getAll();
    }
    public function all()
    {
        return $this->kidRepo->all();
    }
    public function store(Request $request)
    {
        $kid = new Kid();
        $data = $request->all();
        $data['age'] = Carbon::parse($request->age)->age;
        $kid->fill($data);
        $this->kidRepo->save($kid);
    }
    public function getKid($id)
    {
        return $this->kidRepo->getKid($id);
    }
    public function update(Request $request, $id)
    {
        $kid = $this->kidRepo->getKid($id);
        $data = $request->all();
        $data['age'] = Carbon::parse($request->age)->age;
        $kid->fill($data);
        $this->kidRepo->save($kid);
    }
    public function destroy($id)
    {
        $this->kidRepo->destroy($id);
    }
    public function count($id)
    {
        return $this->kidRepo->count($id);
    }
}
