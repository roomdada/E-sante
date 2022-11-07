<?php

namespace App\Policies;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPolicy
{
    use HandlesAuthorization;

    public const CONSULTATION_MANAGE = 'consultation.*';
    public const CONSULTATION_CREATE = 'consultation.create';
    public const CONSULTATION_LIST = 'consultation.list';
    public const CONSULTATION_DELETE = 'consultation.delete';
    public const CONSULTATION_UPDATE = 'consultation.update';

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->can(self::CONSULTATION_MANAGE)){
          return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Consultation $consultation)
    {
        if($user->can(self::CONSULTATION_MANAGE)){
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
        if($user->can(self::CONSULTATION_CREATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Consultation $consultation)
    {
        if($user->can(self::CONSULTATION_UPDATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Consultation $consultation)
    {
        if($user->can(self::CONSULTATION_DELETE)){
          return true;
        }
    }

}
