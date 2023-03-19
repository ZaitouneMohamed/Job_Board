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
        return User::select('id','name','email')->paginate(5);
    }

    public function delete($id) {
        User::find($id)->delete();
        $this->getUsersProperty();
    }
}
