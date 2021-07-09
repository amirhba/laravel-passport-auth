<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // try to implement this static function with repository
    // try to write test for this static function
    public static function attempt($data)
    {
        if(!$user = User::where('email',$data['email'])->first())
            return false;

        if(!password_verify($data['password'],$user->password))
            return false;

        Auth::loginUsingId($user->id);
        return true;
    }
}


?>
