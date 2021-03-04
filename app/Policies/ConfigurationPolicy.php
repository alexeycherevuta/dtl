<?php
namespace App\Policies;
use App\User;
use App\Configuration;
use Illuminate\Auth\Access\HandlesAuthorization;
class ConfigurationPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
    }
    public function view(User $user, Configuration $configuration)
    {
    }
    public function create(User $user)
    {
    }
    public function update(?User $user, Configuration $configuration, $requestKey)
    {
        return $configuration->key === $requestKey;
    }
    public function delete(?User $user, Configuration $configuration, $requestKey)
    {
        return $configuration->key === $requestKey;
    }
    public function restore(User $user, Configuration $configuration)
    {
    }
    public function forceDelete(User $user, Configuration $configuration)
    {
    }
}
