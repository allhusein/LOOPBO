<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin =Role::create(['name'=>'superadmin']);
        $dosen =Role::create(['name'=>'dosen']);
        $mahasiswa =Role::create(['name'=>'mahasiswa']);

        $sa = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@loop.com',
            'password' => bcrypt('admin1234')
        ]);
        $sa->assignRole($superadmin);

        $d = User::create([
            'name' => 'Dosen',
            'email' => 'dosen@loop.com',
            'password' => bcrypt('admin1234')
        ]);
        $d->assignRole($dosen);

        $m = User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@loop.com',
            'password' => bcrypt('admin1234')
        ]);
        $m->assignRole($mahasiswa);
    }
}
