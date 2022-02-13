<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'status' => 1,
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
            'status' => 1
        ]);
    }
}
