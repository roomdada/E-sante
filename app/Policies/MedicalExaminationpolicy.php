<?php

namespace App\Policies;

use App\Models\MedicalExamination;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalExaminationpolicy
{
    use HandlesAuthorization;
    public const MEDICAL_EXAMINATION_MANAGE = 'medical_examination.*';
    public const MEDICAL_EXAMINATION_CREATE = 'medical_examination.create';
    public const MEDICAL_EXAMINATION_LIST = 'medical_examination.list';
    public const MEDICAL_EXAMINATION_DELETE = 'medical_examination.delete';
    public const MEDICAL_EXAMINATION_UPDATE = 'medical_examination.update';

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->can(self::MEDICAL_EXAMINATION_MANAGE)){
          return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicalExamination  $medicalExamination
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MedicalExamination $medicalExamination)
    {
        if($user->can(self::MEDICAL_EXAMINATION_MANAGE)){
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
        if($user->can(self::MEDICAL_EXAMINATION_CREATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicalExamination  $medicalExamination
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MedicalExamination $medicalExamination)
    {
        if($user->can(self::MEDICAL_EXAMINATION_UPDATE)){
          return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicalExamination  $medicalExamination
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MedicalExamination $medicalExamination)
    {
        if($user->can(self::MEDICAL_EXAMINATION_DELETE)){
          return true;
        }
    }
}
