<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
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
        'store_name'=>'فاترينا',
        'free_shipping_label'=>'توصيل مجاني',
        'local_label'=>'توصيل محلي',
        'outer_label'=>'توصيل خارجي',
      ]
    ]);
  }
}
