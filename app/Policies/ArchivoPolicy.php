<?php

namespace App\Policies;

use App\Models\Archivo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArchivoPolicy
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
        return $user->tipo == 'Administrador'; 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return mixed
     */
    public function view(User $user, Archivo $archivo)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return mixed
     */
    public function update(User $user, Archivo $archivo)
    {
        return $user->tipo == 'Administrador'; 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return mixed
     */
    public function delete(User $user, Archivo $archivo)
    {
        return $user->tipo == 'Cliente'; 
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return mixed
     */
    public function restore(User $user, Archivo $archivo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return mixed
     */
    public function forceDelete(User $user, Archivo $archivo)
    {
        //
    }
}
