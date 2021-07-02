<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Programa;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function view(User $user, Programa $programa)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //$this->authorize('create');
        //return $user->tipo == 'Cliente';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function update(User $user, Programa $programa)
    {
        return $user->tipo == 'Administrador'; 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function delete(User $user, Programa $programa)
    {
        //return $programa->prestadores->count() == 0;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function restore(User $user, Programa $programa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function forceDelete(User $user, Programa $programa)
    {
        //
    }
}
