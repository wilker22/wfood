<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpadateRole;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;

        $this->middleware(['can:roles']);

    }

    public function index()
    {
        $roles = $this->repository->paginate();

        return view('admin.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.pages.roles.create');
    }

    public function store(StoreUpadateRole $request)
    {

        $this->repository->create($request->all());

        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();

        }

        return view('admin.pages.roles.show', compact('role'));
    }

    public function edit($id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();

        }

        return view('admin.pages.roles.edit', compact('role'));
    }

    public function update(StoreUpadateRole $request, $id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();

        }

        $role->update($request->all());

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();

        }

        $role->delete();
         return redirect()->route('roles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $roles = $this->repository
                        ->where(function($query) use ($request){
                            if($request->filter){
                                $query->where('name', 'LIKE', "%{$request->filter}%");
                                $query->orwhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })->paginate();

        return view('admin.pages.roles.index', compact('roles', 'filters'));
    }
}
