<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' 	=> 'header_logo',
                'value' => 'upload/images/settings/logo (1)_1681111194.webp',
            ],
            [
                'key' 	=> 'footer_logo',
                'value' => 'upload/images/settings/logo (1)_1681111194.webp',
            ],
            [
                'key'   => 'bazigate_website_url',
                'value' => 'https://bazzigate.com/',
            ],
            [
                'key'   => 'facebook_link',
                'value' => 'https://www.facebook.com/bazzigate',
            ],
            [
                'key'   => 'twitter_link',
                'value' => 'https://twitter.com/bazzigate',
            ],
            [
                'key'   => 'instagram_link',
                'value' => 'https://www.instagram.com/bazzigate/',
            ],
            [
                'key'   => 'app_store_link',
                'value' => 'https://apps.apple.com/us/app/integral-calculator-solver/id1624033320',
            ],
            [
                'key'   => 'playstore_link',
                'value' => 'https://play.google.com/store/apps/details?id=integration.integral.calculator',
            ],
            [
                'key'   => 'copyright_link',
                'value' => 'https://calculator-integral.com/',
            ],
            [
                'key'   => 'google_search_console_code',
                'value' => '',
            ],
            [
                'key'   => 'google_analytics_code',
                'value' => '',
            ],
            [
                'key'   => 'clarity_code',
                'value' => '',
            ],
            [
                'key'   => 'job_application_message',
                'value' => 'Thank you for submitting your resume',
            ],
            [
                'key'   => 'feadback_message',
                'value' => 'Thanks for filling out our form!',
            ],
            [
                'key'   => 'comment_message',
                'value' => 'Thanks for filling out our form!',
            ],
        ]);
    }
}
