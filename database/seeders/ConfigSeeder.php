<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'inkwell.jpg'
            ],
            [
                'name' => 'favicon',
                'value' => 'favicon.ico'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to Inkwell'
            ],
            [
                'name' => 'caption',
                'value' => 'inkwell is your personal space to reflect on life’s moments, express your thoughts, and grow through self-discovery.'
            ],
            [
                'name' => 'site_footer',
                'value' => 'Inkwell Your source of inspiration.'
            ],
            [
                'name' => 'site_copyright',
                'value' => 'Copyright © Inkwell 2024 Made with ♥ Inkwell Team'
            ],
            [
                'name' => 'phone',
                'value' => '+62 812-3456-7890'
            ],
            [
                'name' => 'email',
                'value' => 'yourname@example.com'
            ],
            [
                'name' => 'instagram',
                'value' => 'https://www.instagram.com/yourusername'
            ],
            [
                'name' => 'twitter',
                'value' => 'https://twitter.com/yourusername'
            ],
            [
                'name' => 'facebook',
                'value' => 'https://www.facebook.com/yourusername'
            ],
        ]);
    }
}
