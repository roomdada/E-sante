<?php 
namespace App\Actions\User;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EditUser 
{
  public function execute(array $data, User $user) : User 
  {
    DB::beginTransaction();

    $user->update([
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'contact' => $data['contact'] ?? null,
      'email' => $data['email'] ?? null,
      'occupation' => $data['occupation'] ?? null,
      'parent_id' => $data['parent_id'] ?? null,
      'location' => $data['location'] ?? null,
      'gender' => $data['gender'] ?? null,
      'birthday_at' => $data['birthday_at'] ?? null,
      'user_type_id' => $data['user_type_id'] ?? null,
    ]);

    DB::commit();

    return $user->fresh();
  }
}
