<?php

namespace App\Policies;

use App\Models\Prescription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrescriptionPolicy
{
    use HandlesAuthorization;

    public const PRESCRIPTION_MANAGE = 'prescription.*';
    public const PRESCRIPTION_CREATE = 'prescription.create';
    public const PRESCRIPTION_LIST = 'prescription.list';
    public const PRESCRIPTION_DELETE = 'prescription.delete';
    public const PRESCRIPTION_UPDATE = 'prescription.update';

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->can(self::PRESCRIPTION_MANAGE)){
          return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Prescription $prescription)
    {
        if($user->can(self::PRESCRIPTION_MANAGE)){
          return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->can(self::PRESCRIPTION_CREATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Prescription $prescription)
    {
        if($user->can(self::PRESCRIPTION_UPDATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Prescription $prescription)
    {
        if($user->can(self::PRESCRIPTION_DELETE)){
          return true;
        }
    }

}
