<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::get(['id', 'name']);
        return view('backend.dashboard.admin.users.index', ['users' => $users, 'roles'=>$roles]);
    }

    public function trash()
    {
        $users = User::onlyTrashed()->paginate(100);
        return view('backend.dashboard.admin.users.trash', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request): Response
    {
        if ($request->ajax()) {
            $roles = Role::where('id', $request->role_id)->first();
            return $roles->permissions;
        }

        $roles = Role::get(['id', 'name']);

        $users = User::paginate(10);

        return view('backend.dashboard.admin.users.create', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(UserFormRequest $request, UserService $userService, RoleService $roleService): RedirectResponse
    {
        $user = $userService->storeUser($request);

        $roleService->storeUserRole($user,
            $request->get('user_role'));
        $request->session()->flash('message', 'Successfully created User');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(User $user)
    {
        return view('backend.dashboard.admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(User $user): View|Factory|Application
    {
        $roles = Role::get();
        $userRole = $user->roles->first();
        if ($userRole != null) {
            $rolePermissions = $userRole->allRolePermissions;
        } else {
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        return view('backend.dashboard.admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRole' => $userRole,
            'rolePermissions' => $rolePermissions,
            'userPermissions' => $userPermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        //validate the fields
        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if ($request->role != null) {
            $user->roles()->attach($request->role);
            $user->save();
        }

        if ($request->permissions != null) {
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        $request->session()->flash('message', 'Successfully edited user');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();
        $user->profile()->delete();

        return redirect()->route('users.index');
    }
}
