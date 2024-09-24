<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            'key'           => 'contact_email',
            'name'          => 'Contact form email address',
            'description'   => 'The email address that all emails from the contact form will go to.',
            'value'         => 'drawchart.vn@gmail.com',
            'type'          => 0,
        ]);

        DB::table('settings')->insert([
            'key'           => 'contact_phone',
            'name'          => 'Contact via phone',
            'description'   => 'Contact via phone',
            'value'         => '+1 234 567 89 - +1 234 678 90',
            'type'          => 0,
        ]);

        DB::table('settings')->insert([
            'key'           => 'contact_address',
            'name'          => 'Contact form address',
            'description'   => 'Contact form address',
            'value'         => 'Ho Chi Minh City, Vietnam',
            'type'          => 0,
        ]);

        DB::table('settings')->insert([
            'key'           => 'link_facebook_page',
            'name'          => 'Link fan page facebook',
            'description'   => 'Link fan page facebook',
            'value'         => 'htpps://facebook.com/NamVietMedia.NV',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_google_page',
            'name'          => 'Link fan page google',
            'description'   => 'Link fan page google',
            'value'         => 'https://gooogle.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_twitter_page',
            'name'          => 'Link fan page twitter',
            'description'   => 'Link fan page twitter',
            'value'         => 'https://twitter.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_youtube_page',
            'name'          => 'Link fan page youtube',
            'description'   => 'Link fan page youtube',
            'value'         => 'https://youtube.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_slack_page',
            'name'          => 'Link fan page slack',
            'description'   => 'Link fan page slack',
            'value'         => 'https://slack.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_skype_page',
            'name'          => 'Link fan page skype',
            'description'   => 'Link fan page skype',
            'value'         => 'https://skype.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_instagram_page',
            'name'          => 'Link fan page instagram',
            'description'   => 'Link fan page instagram',
            'value'         => 'https://instagram.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'link_pinterest_page',
            'name'          => 'Link fan page pinterest',
            'description'   => 'Link fan page pinterest',
            'value'         => 'https://pinterest.com/',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'site_title',
            'name'          => 'Site title',
            'description'   => 'Website title',
            'value'         => 'NamVietMedia',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'site_logo',
            'name'          => 'Site logo',
            'description'   => 'Website logo',
            'value'         => 'logo.png',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'meta_keywords',
            'name'          => 'Site meta keywords',
            'description'   => 'Website meta',
            'value'         => 'Drawchart',
            'type'          => 0,

        ]);

        DB::table('settings')->insert([
            'key'           => 'meta_description',
            'name'          => 'Site meta description',
            'description'   => 'Website meta description',
            'value'         => 'Project demo',
            'type'          => 0,

        ]);

        
    }
}
