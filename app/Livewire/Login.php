<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required', message: 'Username tidak boleh kosong.')]
    public $username;
    #[Validate('required', message: 'Password tidak boleh kosong.')]
    public $password;

    public function login()
    {
        $this->validate();

        if (Auth::guard("inspector")->attempt(["username" => $this->username, "password" => $this->password])) {
            if (Auth::guard("inspector")->user()->lvl == "admin") {
                return redirect("/admin/control/panel/dashboard");
            } else {
                return redirect("/petugas/control/panel/dashboard");
            }
        } else if (Auth::guard("member")->attempt(["user" => $this->username, "password" => $this->password])) {
            return redirect("/home");
        } else {
            session()->flash("error", "Username atau Password tidak ditemukan.");
        }
    }
    public function render()
    {
        return view('auth.login')->extends('layouts.master')->section('content');
    }
}
