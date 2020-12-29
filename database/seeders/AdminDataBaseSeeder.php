<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminDataBaseSeeder extends Seeder
{
  // php artisan make:seeder AdminDataBaseSeeder
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Admin::create([
      'name'=>'eman',
      'email'=>'eman@example.com',
      'password'=>bcrypt('12345678'),
    ]);
  }
}
