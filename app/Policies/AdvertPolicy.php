<?php

namespace App\Policies;

use App\Models\Advert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdvertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any adverts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the advert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function view(User $user, Advert $advert)
    {
        return true;
    }

    /**
     * Determine whether the user can create adverts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === 'user';
    }

    /**
     * Determine whether the user can update the advert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }

    /**
     * Determine whether the user can delete the advert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function delete(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }

    /**
     * Determine whether the user can restore the advert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function restore(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }

    /**
     * Determine whether the user can permanently delete the advert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function forceDelete(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }
}
