<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Candidatura;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidaturaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Candidatura');
    }

    public function view(AuthUser $authUser, Candidatura $candidatura): bool
    {
        return $authUser->can('View:Candidatura');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Candidatura');
    }

    public function update(AuthUser $authUser, Candidatura $candidatura): bool
    {
        return $authUser->can('Update:Candidatura');
    }

    public function delete(AuthUser $authUser, Candidatura $candidatura): bool
    {
        return $authUser->can('Delete:Candidatura');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Candidatura');
    }

    public function restore(AuthUser $authUser, Candidatura $candidatura): bool
    {
        return $authUser->can('Restore:Candidatura');
    }

    public function forceDelete(AuthUser $authUser, Candidatura $candidatura): bool
    {
        return $authUser->can('ForceDelete:Candidatura');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Candidatura');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Candidatura');
    }

    public function replicate(AuthUser $authUser, Candidatura $candidatura): bool
    {
        return $authUser->can('Replicate:Candidatura');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Candidatura');
    }

}