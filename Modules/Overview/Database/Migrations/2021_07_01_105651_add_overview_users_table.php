<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
    
class AddOverviewUsersTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create default users for the overview Module
        // This is a dummy template (should be up-to-date on prod version)
        $setupuser = array('name' => 'OverviewSetup','email' => 'overview_setup@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        $backenduser = array('name' => 'OverviewBackend','email' => 'overview_backend@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        $frontenduser = array('name' => 'OverviewFrontend','email' => 'overview_frontend@admin.com','email_verified_at' => '2021-01-02 14:27:42','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => 'Nwn6kSgBp8','current_team_id' => NULL,'profile_photo_path' => NULL,'created_at' => '2021-01-02 14:27:42','updated_at' => '2021-01-02 14:27:42'); 
        
        DB::table('users')->insert($defaultuser);
        DB::table('users')->insert($backenduser);
        DB::table('users')->insert($frontenduser);

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('users');

    }
}
