<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $state = [];
    public $showEditModal = false;
    public $user;
    public $search;
    public $userIdBeingRemoved = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function addNew(){
        $this->state = [];
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser(){
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ])->validate();

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        if($user){
            $user->assignRole($validatedData['role']);
            $this->dispatchBrowserEvent('hide-form', ['message' => 'user Created sucessfully!']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to create user']);
        }
    }

    public function editUser(User $user){
        $this->showEditModal = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser(){
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes',
        ])->validate();

        if(!empty($validatedData['password'])){
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        if ($this->user->update($validatedData)) {
            $this->dispatchBrowserEvent('hide-form', ['message' => 'user updated sucessfully!']);
        }
    }

    public function confirmUserRemoval($userId){
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser(){
        $user = User::findorFail($this->userIdBeingRemoved);
        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);
    }

    public function render()
    {
        $search= '%'.$this->search.'%';

        $users = User::latest()
            ->where(function($query) use ($search){
                $query->where('name','LIKE',$search);
                $query->orWhere('email','LIKE',$search);
                $query->orWhere('role','LIKE',$search);
            })->paginate();
        $userCount = User::count();
        $user_role = Role::get();

        return view('livewire.admin.users.list-users', [
            'users' => $users,
            'user_role' => $user_role,
            'userCount' => $userCount,
        ]);
    }
}
