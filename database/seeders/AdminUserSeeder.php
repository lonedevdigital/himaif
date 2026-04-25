<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Create or update the administrator account.
     */
    public function run(): void
    {
        $user = User::firstOrNew([
            'email' => env('ADMIN_EMAIL', 'hima_informatika@teknokrat.ac.id'),
        ]);

        $user->forceFill([
            'name' => env('ADMIN_NAME', 'Administrator HIMA IF'),
            'password' => Hash::make(env('ADMIN_PASSWORD', '8februari2001')),
            'email_verified_at' => now(),
        ])->save();
    }
}
