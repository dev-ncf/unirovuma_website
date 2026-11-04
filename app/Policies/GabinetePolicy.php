<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Gabinete;
use Illuminate\Auth\Access\HandlesAuthorization;

class GabinetePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Gabinete');
    }

    public function view(AuthUser $authUser, Gabinete $gabinete): bool
    {
        return $authUser->can('View:Gabinete');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Gabinete');
    }

    public function update(AuthUser $authUser, Gabinete $gabinete): bool
    {
        return $authUser->can('Update:Gabinete');
    }

    public function delete(AuthUser $authUser, Gabinete $gabinete): bool
    {
        return $authUser->can('Delete:Gabinete');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Gabinete');
    }

    public function restore(AuthUser $authUser, Gabinete $gabinete): bool
    {
        return $authUser->can('Restore:Gabinete');
    }

    public function forceDelete(AuthUser $authUser, Gabinete $gabinete): bool
    {
        return $authUser->can('ForceDelete:Gabinete');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Gabinete');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Gabinete');
    }

    public function replicate(AuthUser $authUser, Gabinete $gabinete): bool
    {
        return $authUser->can('Replicate:Gabinete');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Gabinete');
    }

}