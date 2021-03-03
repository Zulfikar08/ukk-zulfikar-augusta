<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'Zulfikar Augusta',
            'email' => 'zulfikarsubang89@gmail.com',
            'phone' => '087715816110',
            'nik' => '0199288492011211',
            'password' => bcrypt('subang89')
        ]);

        $admin->assignRole('admin');

        $petugas = User::create([
            'name' => 'Nikola Tesla',
            'email' => 'niko_t@gmail.com',
            'phone' => '085224220227',
            'nik' => '9989912311791929',
            'password' => bcrypt('subang89')
        ]);

        $petugas->assignRole('petugas');

        $masyarakat = User::create([
            'name' => 'Thomas Alva Edison',
            'email' => 'thomaselect@gmail.com',
            'phone' => '083816069697',
            'nik' => '0088182661441444',
            'password' => bcrypt('subang89')
        ]);

        $masyarakat->assignRole('masyarakat');
    }
}
