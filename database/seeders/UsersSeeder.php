<?php

namespace Database\Seeders;

use App\Domains\User\TypesUserDomain;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder implements TypesUserDomain
{

    public function run(): void
    {
        User::create([
            'first_name' => 'Gabriel',
            'last_name' => 'Oliveira',
            'document' => '54424309860',
            'email' => 'gabriel@gestaobela.com',
            'password' => bcrypt('pim'),
            'phone' => '14981062041',
            'gender' => 'M',
            'birthday' => '2005-10-04',
            'type' => self::USER_TYPE_EMPLOYEE,
        ]);
    }
}
