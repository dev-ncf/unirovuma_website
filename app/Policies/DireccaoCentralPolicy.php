<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\DireccaoCentral;
use Illuminate\Auth\Access\HandlesAuthorization;

class DireccaoCentralPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DireccaoCentral');
    }

    public function view(AuthUser $authUser, DireccaoCentral $direccaoCentral): bool
    {
        return $authUser->can('View:DireccaoCentral');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DireccaoCentral');
    }

    public function update(AuthUser $authUser, DireccaoCentral $direccaoCentral): bool
    {
        return $authUser->can('Update:DireccaoCentral');
    }

    public function delete(AuthUser $authUser, DireccaoCentral $direccaoCentral): bool
    {
        return $authUser->can('Delete:DireccaoCentral');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:DireccaoCentral');
    }

    public function restore(AuthUser $authUser, DireccaoCentral $direccaoCentral): bool
    {
        return $authUser->can('Restore:DireccaoCentral');
    }

    public function forceDelete(AuthUser $authUser, DireccaoCentral $direccaoCentral): bool
    {
        return $authUser->can('ForceDelete:DireccaoCentral');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DireccaoCentral');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DireccaoCentral');
    }

    public function replicate(AuthUser $authUser, DireccaoCentral $direccaoCentral): bool
    {
        return $authUser->can('Replicate:DireccaoCentral');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DireccaoCentral');
    }

}