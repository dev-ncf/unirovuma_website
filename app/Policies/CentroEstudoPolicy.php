<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CentroEstudo;
use Illuminate\Auth\Access\HandlesAuthorization;

class CentroEstudoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CentroEstudo');
    }

    public function view(AuthUser $authUser, CentroEstudo $centroEstudo): bool
    {
        return $authUser->can('View:CentroEstudo');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CentroEstudo');
    }

    public function update(AuthUser $authUser, CentroEstudo $centroEstudo): bool
    {
        return $authUser->can('Update:CentroEstudo');
    }

    public function delete(AuthUser $authUser, CentroEstudo $centroEstudo): bool
    {
        return $authUser->can('Delete:CentroEstudo');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CentroEstudo');
    }

    public function restore(AuthUser $authUser, CentroEstudo $centroEstudo): bool
    {
        return $authUser->can('Restore:CentroEstudo');
    }

    public function forceDelete(AuthUser $authUser, CentroEstudo $centroEstudo): bool
    {
        return $authUser->can('ForceDelete:CentroEstudo');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CentroEstudo');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CentroEstudo');
    }

    public function replicate(AuthUser $authUser, CentroEstudo $centroEstudo): bool
    {
        return $authUser->can('Replicate:CentroEstudo');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CentroEstudo');
    }

}