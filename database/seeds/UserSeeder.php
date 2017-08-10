<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat role pemilik
        $pemilikRole = new Role();
        $pemilikRole->name = "pemilik";
        $pemilikRole->display_name = "Pemilik";
        $pemilikRole->save();

        //Membuat role karyawan
        $karyawanRole = new Role();
        $karyawanRole->name = "karyawan";
        $karyawanRole->display_name = "Karyawan";
        $karyawanRole->save();

        //Membuat sample pemilik
        $pemilik = new User();
        $pemilik->name = 'Pemilik Toko';
        $pemilik->email = 'pemilik@gmail.com';
        $pemilik->password = bcrypt('sukses');
        $pemilik->save();
        $pemilik->attachRole($pemilikRole);

        //Membuat sample karyawan
        $karyawan = new User();
        $karyawan->name = "Karyawan";
        $karyawan->email = 'karyawan@gmail.com';
        $karyawan->password = bcrypt('sukses');
        $karyawan->save();
        $karyawan->attachRole($karyawanRole);
    }
}
