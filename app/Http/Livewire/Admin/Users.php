<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.users');
    }

    public function getUsersProperty() {
        return User::select('id','name','email','active')->latest()->paginate(5);
    }

    public function delete($id) {
        User::find($id)->delete();
        $this->getUsersProperty();
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->update([
            "active" => 1
        ]);
        $this->getUsersProperty();
    }

    public function desactive($id)
    {
        $user = User::find($id);
        $user->update([
            "active" => 0
        ]);
        $this->getUsersProperty();
    }
}
