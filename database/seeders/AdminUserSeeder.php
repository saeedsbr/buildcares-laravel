<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email    = env('ADMIN_EMAIL', 'admin@buildcares.com');
        $password = env('ADMIN_PASSWORD', 'changeme123');
        $name     = env('ADMIN_NAME', 'Admin');

        $user = User::where('email', $email)->first();

        if (! $user) {
            User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
            ]);
            $this->command?->info("Admin user created: {$email}");
            return;
        }

        // If ADMIN_PASSWORD_RESET=true, force-reset the password on this deploy.
        if (filter_var(env('ADMIN_PASSWORD_RESET', false), FILTER_VALIDATE_BOOLEAN)) {
            $user->update([
                'name'     => $name,
                'password' => Hash::make($password),
            ]);
            $this->command?->info("Admin password reset for: {$email}");
        }
    }
}
