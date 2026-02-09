<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class StaticUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        if ($identifier == 1) {
            return $this->getStaticUser();
        }
        return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Not needed for static user
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (isset($credentials['email']) && $credentials['email'] === env('ADMIN_EMAIL')) {
            return $this->getStaticUser();
        }
        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return isset($credentials['email']) &&
               isset($credentials['password']) &&
               $credentials['email'] === env('ADMIN_EMAIL') &&
               $credentials['password'] === env('ADMIN_PASSWORD');
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
    {
        return false;
    }

    protected function getStaticUser()
    {
        $user = new User();
        $user->id = 1;
        $user->name = env('ADMIN_NAME', 'Admin');
        $user->email = env('ADMIN_EMAIL');
        $user->password = bcrypt('dummy'); // Not used
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->exists = true;

        return $user;
    }
}
