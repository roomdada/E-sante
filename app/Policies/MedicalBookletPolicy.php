<?php

namespace App\Policies;

use App\Models\MedicalBooklet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalBookletPolicy
{
    use HandlesAuthorization;

    public const MEDICAL_BOOKLET_MANAGE = 'medical_booklet.*';
    public const MEDICAL_BOOKLET_CREATE = 'medical_booklet.create';
    public const MEDICAL_BOOKLET_LIST = 'medical_booklet.list';
    public const MEDICAL_BOOKLET_DELETE = 'medical_booklet.delete';
    public const MEDICAL_BOOKLET_UPDATE = 'medical_booklet.update';


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->can(self::MEDICAL_BOOKLET_MANAGE)){
          return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicalBooklet  $medicalBooklet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MedicalBooklet $medicalBooklet)
    {
        if($user->can(self::MEDICAL_BOOKLET_MANAGE)){
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
        if($user->can(self::MEDICAL_BOOKLET_CREATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicalBooklet  $medicalBooklet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MedicalBooklet $medicalBooklet)
    {
        if($user->can(self::MEDICAL_BOOKLET_UPDATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicalBooklet  $medicalBooklet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MedicalBooklet $medicalBooklet)
    {
        if($user->can(self::MEDICAL_BOOKLET_DELETE)){
          return true;
        }
    }


}
