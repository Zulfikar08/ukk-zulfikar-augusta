<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'email_verified_at' => Carbon::now(),
            'email' => 'zulfikarsubang89@gmail.com',
            'phone' => '087715816110',
            'nik' => '0199288492011211',
            'password' => bcrypt('subang89')
        ]);
        $admin2 = User::create([
            'name' => 'Azzahra Ayu Fadillah',
            'email_verified_at' => Carbon::now(),
            'email' => 'azzahra0904@gmail.com',
            'phone' => '087122809110',
            'nik' => '0199282567711211',
            'password' => bcrypt('subang89')
        ]);

        $admin->assignRole('admin');
        $admin2->assignRole('admin');

        $petugas = User::create([
            'name' => 'Nikola Tesla',
            'email_verified_at' => Carbon::now(),
            'email' => 'niko_t@gmail.com',
            'phone' => '085224220227',
            'nik' => '9989912311791929',
            'password' => bcrypt('subang89')
        ]);
        $petugas2 = User::create([
            'name' => 'Kaira Rizky Ghania',
            'email_verified_at' => Carbon::now(),
            'email' => 'kairaRG@gmail.com',
            'phone' => '089042240227',
            'nik' => '0089911092909192',
            'password' => bcrypt('subang89')
        ]);
        $petugas3 = User::create([
            'name' => 'Nazira Kaila Putri',
            'email_verified_at' => Carbon::now(),
            'email' => 'nkp12@gmail.com',
            'phone' => '082718889227',
            'nik' => '0089001299909192',
            'password' => bcrypt('subang89')
        ]);

        $petugas->assignRole('petugas');
        $petugas2->assignRole('petugas');
        $petugas3->assignRole('petugas');

        $masyarakat = User::create([
            'name' => 'Thomas Alva Edison',
            'email_verified_at' => Carbon::now(),
            'email' => 'thomaselect@gmail.com',
            'phone' => '083816069697',
            'nik' => '0088182661441444',
            'password' => bcrypt('subang89')
        ]);
        $masyarakat2 = User::create([
            'name' => 'Clark Kent',
            'email_verified_at' => Carbon::now(),
            'email' => 'iamszlfkr@gmail.com',
            'phone' => '083816069634',
            'nik' => '0088182661441409',
            'password' => bcrypt('subang89')
        ]);
        $masyarakat3 = User::create([
            'name' => 'Bruce Wayne',
            'email_verified_at' => Carbon::now(),
            'email' => 'rtsafika07@gmail.com',
            'phone' => '083818769634',
            'nik' => '0088193201441409',
            'password' => bcrypt('subang89')
        ]);
        $masyarakat4 = User::create([
            'name' => 'Tony Stark',
            'email_verified_at' => Carbon::now(),
            'email' => 'ironman_007@gmail.com',
            'phone' => '081313369634',
            'nik' => '0086256101441409',
            'password' => bcrypt('subang89')
        ]);
        $masyarakat5 = User::create([
            'name' => 'Stave Jobs',
            'email_verified_at' => Carbon::now(),
            'email' => 'captain_america@gmail.com',
            'phone' => '081389967734',
            'nik' => '0086256102451780',
            'password' => bcrypt('subang89')
        ]);

        $masyarakat->assignRole('masyarakat');
        $masyarakat2->assignRole('masyarakat');
        $masyarakat3->assignRole('masyarakat');
        $masyarakat4->assignRole('masyarakat');
        $masyarakat5->assignRole('masyarakat');
        

        // factory(App\User::class, 200)->create();
    }
}
