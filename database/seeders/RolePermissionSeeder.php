<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Policies\UserPolicy;
use App\Models\MedicalBooklet;
use Illuminate\Database\Seeder;
use App\Policies\ConsultationPolicy;
use App\Policies\PrescriptionPolicy;
use App\Policies\MedicalBookletPolicy;
use Illuminate\Support\Facades\Artisan;
use App\Policies\MedicalExaminationpolicy;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Artisan::call('cache:clear');
    resolve(PermissionRegistrar::class)->forgetCachedPermissions();

    $users = Permission::create([
      'name' => UserPolicy::USER_MANAGE,
      'description' => 'Toutes les permissions relative a la gestion des utilisateurs',
    ]);

    $users->children()->saveMany([
      new Permission([
        'name' => UserPolicy::USER_CREATE,
        'description' => 'Créer un utilisateur',
      ]),

      new Permission([
        'name' => UserPolicy::USER_LIST,
        'description' => 'Lister les utilisateurs',
      ]),

      new Permission([
        'name' => UserPolicy::USER_DELETE,
        'description' => 'Supprimer un utilisateur',
      ]),

      new Permission([
        'name' => UserPolicy::USER_UPDATE,
        'description' => 'Editer un utilisateur'
      ])
    ]);

    $consultations = Permission::create([
      'name' => ConsultationPolicy::CONSULTATION_MANAGE,
      'description' => 'Toutes les permissions relatives a la gestion des consultations'
    ]);

    $consultations->children()->saveMany([
      new Permission([
        'name' => ConsultationPolicy::CONSULTATION_CREATE,
        'description' => 'Créer une consultation',
      ]),

      new Permission([
        'name' => ConsultationPolicy::CONSULTATION_LIST,
        'description' => 'Lister les consultations',
      ]),

      new Permission([
        'name' => ConsultationPolicy::CONSULTATION_DELETE,
        'description' => 'Supprimer une consultation',
      ]),

      new Permission([
        'name' => ConsultationPolicy::CONSULTATION_UPDATE,
        'description' => 'Editer une consultation'
      ])
    ]);

    $prescriptions = Permission::create([
      'name' => PrescriptionPolicy::PRESCRIPTION_MANAGE,
      'description' => 'Toutes les permissions relatives a la gestion des ordonnances'
    ]);

    $prescriptions->children()->saveMany([
      new Permission([
        'name' => PrescriptionPolicy::PRESCRIPTION_CREATE,
        'description' => 'Créer une ordonnance'
      ]),
      new Permission([
        'name' => PrescriptionPolicy::PRESCRIPTION_LIST,
        'description' => 'Lister les ordonnances'
      ]),

      new Permission([
        'name' => PrescriptionPolicy::PRESCRIPTION_DELETE,
        'description' => 'Supprimer une ordonnance'
      ]),

      new Permission([
        'name' => PrescriptionPolicy::PRESCRIPTION_UPDATE,
        'description' => 'Editer une ordonnance'
      ])
    ]);

    $medical_booklets = Permission::create([
      'name' => MedicalBookletPolicy::MEDICAL_BOOKLET_MANAGE,
      'description' => 'Toutes les permissions relatives aux carnets de santé'
    ]);

    $medical_booklets->children()->saveMany([
      new Permission([
        'name' => MedicalBookletPolicy::MEDICAL_BOOKLET_CREATE,
        'description' => 'Créer un carnet de santé'
      ]),

      new Permission([
        'name' => MedicalBookletPolicy::MEDICAL_BOOKLET_LIST,
        'description' => 'Lister les carnets de santé'
      ]),

      new Permission([
        'name' => MedicalBookletPolicy::MEDICAL_BOOKLET_DELETE,
        'description' => 'Supprimer un carnet de santé'
      ]),

      new Permission([
        'name' => MedicalBookletPolicy::MEDICAL_BOOKLET_UPDATE,
        'description' => 'Editer un carnet de santé'
      ])
    ]);

    $medical_examinations = Permission::create([
      'name' => MedicalExaminationpolicy::MEDICAL_EXAMINATION_MANAGE,
      'description' => 'Toutes les permissions relatives aux examens médicaux'
    ]);

    $medical_examinations->children()->saveMany([
      new Permission([
        'name' => MedicalExaminationpolicy::MEDICAL_EXAMINATION_CREATE,
        'description' => 'Créer un examen médical'
      ]),

      new Permission([
        'name' => MedicalExaminationpolicy::MEDICAL_EXAMINATION_LIST,
        'description' => 'Lister les examens médicaux'
      ]),

      new Permission([
        'name' => MedicalExaminationpolicy::MEDICAL_EXAMINATION_DELETE,
        'description' => 'Supprimer un examen médical'
      ]),

      new Permission([
        'name' => MedicalExaminationpolicy::MEDICAL_EXAMINATION_UPDATE,
        'description' => 'Editer un examen médical'
      ])
    ]);


    Role::create([
      'id' => Role::SUPER_ADMIN,
      'name' => 'Admin Technique'
    ])->givePermissionTo(Permission::all());

    $admin = User::create([
      'identifier' => 'ADT8',
      'first_name' => 'Admin',
      'last_name' => 'Technique',
      'email' => 'admin@tech.com',
      'password' => bcrypt('password'),
    ]);

    $admin->assignRole(Role::SUPER_ADMIN);


  }
}
