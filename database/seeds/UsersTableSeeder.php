<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV'!="productions")) {
            DB::table('admins')->truncate();
            DB::table('reporters')->truncate();
        }
        
        DB::table('admins')->insert([
            'username'=>'admin',
            'password'=>bcrypt(12121212)
        ]);
        $reporter[] = [
            'nama'=>'reporter',
            'username'=>'reporter',
            'password'=>bcrypt(12121212),
            'status'=>'Aktif',
        ];
        DB::table('reporters')->insert($reporter);
        //
    }
}
