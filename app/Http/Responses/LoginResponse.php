<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        return $request->wantsJson() ? response()->json(['two_factor' => false]) : redirect()->intended($this->getRole());
    }

    private function getRole(){
        $role = auth()->user()->role->name;
        switch($role){
            case 'superadmin':
            case 'admin':
                return route('admin.dashboard');
                break;
            default:
                return route('dashboard');
        }
    }

}
