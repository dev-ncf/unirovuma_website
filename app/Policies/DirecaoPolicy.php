<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Direcao;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirecaoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Direcao');
    }

    public function view(AuthUser $authUser, Direcao $direcao): bool
    {
        return $authUser->can('View:Direcao');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Direcao');
    }

    public function update(AuthUser $authUser, Direcao $direcao): bool
    {
        return $authUser->can('Update:Direcao');
    }

    public function delete(AuthUser $authUser, Direcao $direcao): bool
    {
        return $authUser->can('Delete:Direcao');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Direcao');
    }

    public function restore(AuthUser $authUser, Direcao $direcao): bool
    {
        return $authUser->can('Restore:Direcao');
    }

    public function forceDelete(AuthUser $authUser, Direcao $direcao): bool
    {
        return $authUser->can('ForceDelete:Direcao');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Direcao');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Direcao');
    }

    public function replicate(AuthUser $authUser, Direcao $direcao): bool
    {
        return $authUser->can('Replicate:Direcao');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Direcao');
    }

}