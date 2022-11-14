<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ConsultationType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    ConsultationType::create([
      'name' => 'Consultation préventive',
    ]);

    ConsultationType::create([
      'name' => 'Consultation de suivi',
    ]);

    ConsultationType::create([
      'name' => 'Consultation Post-opératoire',
    ]);

    ConsultationType::create([
      'name' => 'Consultation prenatale',
    ]);

    ConsultationType::create([
      'name' => 'Consultation postnatale',
    ]);

    ConsultationType::create([
      'name' => 'Consultation de maladie',
    ]);


    
    $this->call([
      UserTypeSeeder::class,
      RolePermissionSeeder::class
    ]);
  }
}
