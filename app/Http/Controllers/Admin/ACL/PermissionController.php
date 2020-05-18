<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission){
        $this->repository = $permission;

        $this->middleware(['can:permissions']);
    }


    public function index()
    {
        $permissions = $this->repository->paginate();

        return view('admin.pages.permissions.index', compact('permissions'));
    }


    public function create()
    {
        return view('admin.pages.permissions.create');
    }


    public function store(StoreUpdatePermission $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('permissions.index');
    }


    public function show($id)
    {
        if(!$permission = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', compact('permission'));

    }


    public function edit($id)
    {

        if(!$permission = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.permissions.edit', compact('permission'));

    }


    public function update(StoreUpdatePermission $request, $id)
    {
        if(!$permission = $this->repository->find($id)){
          return redirect()->back();

        }
        $permission->update($request->all());
        return redirect()->route('permissions.index');
    }


    public function destroy($id)
    {
        if(!$permission = $this->repository->find($id)){
            return redirect()->back();
        }
          $permission->delete();
          return redirect()
                    ->route('permissions.index')
                    ->with('message', 'Perfil removido com sucesso!');
    }

    public function search(Request $request)
    {
        //dd($request->all());
        $filters = $request->only('filter');//filter é nome do campo de pesquisa na index
        $permissions = $this->repository
                    ->where(function($query) use ($request){
                        if($request->filter){
                            $query->where('name', 'LIKE', "%{$request->filter}%");
                            $query->orwhere('description','LIKE', "%{$request->filter}%");
                        }
                    })
                    ->paginate();

        return view('admin.pages.permissions.index', compact('permissions','filters'));
    }
}
