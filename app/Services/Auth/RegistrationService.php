<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\Attendee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function register(array $data): User
    {
        return DB::transaction(function () use ($data) {

            $attendee = Attendee::query()
                ->where('email', $data['email'])
                ->first();

            if (!$attendee) {
                throw new \Exception(
                    'Email is not authorized.'
                );
            }

            if ($attendee->is_registered) {
                throw new \Exception(
                    'Email already registered.'
                );
            }

            $user = User::create([
                'attendee_id' => $attendee->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make(
                    $data['password']
                ),
            ]);

            $attendee->update([
                'is_registered' => true,
            ]);

            return $user;
        });
    }
}
