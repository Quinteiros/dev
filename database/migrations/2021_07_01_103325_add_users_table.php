<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create 1 super admin user admin@admin.com
        $defaultuser = array('id' => '1', 'name' => 'Superadmin','email' => 'admin@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        $teammember2 = array('id' => '2', 'name' => 'Admin','email' => 'setup@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        $teammember3 = array('id' => '3', 'name' => 'Backend','email' => 'backend@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        $testuser = array('id' => '4', 'name' => 'Member','email' => 'member@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        
        DB::table('users')->insert($defaultuser);
        DB::table('users')->insert($teammember2);
        DB::table('users')->insert($teammember3);
        DB::table('users')->insert($testuser);
        
        foreach(\Spatie\Permission\Models\Role::all() as $role)
        {
            \App\Models\User::find(1)->assignRole($role);
        }
        \DB::table('model_has_roles')->insert(
            // testuser has a quinteiro role
            array('role_id' => '7','model_type' => 'App\\Models\\User','model_id' => '4')
        );
        
        // Create 10 random users
        \App\Models\User::factory(10)->create();
        $users = \App\Models\User::all();
        foreach($users as $user){
            DB::table('teams')->insert([
                'name' => 'Team '.Str::random(10),
                'personal_team' => 1,
                'user_id' => $user->id,
            ]);
            
        }

        // Add some users in team
        DB::table('team_user')->insert(
            array(
                array('id' => '1','team_id' => '1','user_id' => '2','role' => 'editor','created_at' => '2021-01-02 14:59:05','updated_at' => '2021-01-02 14:59:05'),
                array('id' => '2','team_id' => '1','user_id' => '4','role' => 'editor','created_at' => '2021-01-02 14:59:05','updated_at' => '2021-01-02 14:59:05')
            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}