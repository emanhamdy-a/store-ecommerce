<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingDataBaseSeeder extends Seeder
{
  // php artisan make:seeder SettingDataBaseSeeder
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Setting::setMany([
      'default_locale'=>'ar',
      'default_timezone'=>'Africa/Cairo',
      'reviews_enabled'=>true,
      'auto_approve_reviews'=>true,
      'supported_currencies'=>['USD','LE','SAR'],
      'default_currency'=>'USD',
      'store_email'=>'admin@ecommerce.test',
      'search_engine'=>'myspl',
      'local_pickup cost'=>'0',
      'flat_rate_cost'=>'0',
      'translatable'=>[
        'store_name'=>'fleet cart',
        'free_shipping_label'=>'Free Shipping',
        'local_label'=>'Local shipping',
        'outer_label'=>'outer shipping',
      ]
    ]);
  }
}
