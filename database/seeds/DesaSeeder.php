<?php

use Illuminate\Database\Seeder;
use App\Desa;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create(
            [ 'nama_desa' => 'Belendung']
        );
        Desa::create(
            [ 'nama_desa' => 'Cibalandong Jaya']
        );
        Desa::create(
            [ 'nama_desa' => 'Cibogo']
        );
        Desa::create(
            [ 'nama_desa' => 'Cinangsi']
        );
        Desa::create(
            [ 'nama_desa' => 'Cisaga']
        );
        Desa::create(
            [ 'nama_desa' => 'Majasari']
        );
        Desa::create(
            [ 'nama_desa' => 'Padaasih']
        );
        Desa::create(
            [ 'nama_desa' => 'Sadawarna']
        );
        Desa::create(
            [ 'nama_desa' => 'Sumurbarang']
        );
    }
}
