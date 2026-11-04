<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\UnidadeAcademica;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnidadeAcademicaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:UnidadeAcademica');
    }

    public function view(AuthUser $authUser, UnidadeAcademica $unidadeAcademica): bool
    {
        return $authUser->can('View:UnidadeAcademica');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:UnidadeAcademica');
    }

    public function update(AuthUser $authUser, UnidadeAcademica $unidadeAcademica): bool
    {
        return $authUser->can('Update:UnidadeAcademica');
    }

    public function delete(AuthUser $authUser, UnidadeAcademica $unidadeAcademica): bool
    {
        return $authUser->can('Delete:UnidadeAcademica');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:UnidadeAcademica');
    }

    public function restore(AuthUser $authUser, UnidadeAcademica $unidadeAcademica): bool
    {
        return $authUser->can('Restore:UnidadeAcademica');
    }

    public function forceDelete(AuthUser $authUser, UnidadeAcademica $unidadeAcademica): bool
    {
        return $authUser->can('ForceDelete:UnidadeAcademica');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:UnidadeAcademica');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:UnidadeAcademica');
    }

    public function replicate(AuthUser $authUser, UnidadeAcademica $unidadeAcademica): bool
    {
        return $authUser->can('Replicate:UnidadeAcademica');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:UnidadeAcademica');
    }

}