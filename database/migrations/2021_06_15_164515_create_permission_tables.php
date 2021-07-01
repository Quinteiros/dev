<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// In order to seed Roles 
use \Spatie\Permission\Models\Role as Role;
use \Spatie\Permission\Models\Permission as Permission;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger('permission_id');

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(['permission_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger('role_id');

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['role_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id'], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));

        
        Role::create(['name' => 'superadmin', 'description' => '{"fr":"Je suis le seul maître à bord."}']); // Not to be communicated
        Role::create(['name' => 'admin', 'description' => '{"fr":"Je suis administrateur de ressources"}']); // Not to be communicated
        Role::create(['name' => 'backend', 'description' => '{"fr":"Je suis administrateur de module"}']); // Not to be communicated
        Role::create(['name' => 'frontend', 'description' => '{"fr":"J\'accède aux fonctions privées du module"}']); // Not to be communicated
        
        // EXTERNALS
        Role::create(['name' => 'partner', 'description' => '{"fr":"Je suis partenaire de la plateforme"}']); // Not to be communicated
        Role::create(['name' => 'accountant', 'description' => '{"fr":"Je suis comptable au sein de la plateforme"}']); // Not to be communicated
        
        // COMMUNITY
        Role::create(['name' => 'free-member', 'description' => '{"fr":"Je suis membre de la plateforme..."}']); // Member if any paid license
        Role::create(['name' => 'member', 'description' => '{"fr":"Je suis membre de la plateforme..."}']); // Member if any paid license
        Role::create(['name' => 'member-plus', 'description' => '{"fr":"Je suis membre, avec fonctions."}']); // Quinteiro as soon as involved
        
        // CORE TEAM
        Role::create(['name' => 'developer', 'description' => '{"fr":"Je co-développe pour la plate-forme" et souhaite développer des modules ou des fonctionnalités pour les modules"}']); // Access dev requests
        Role::create(['name' => 'tester', 'description' => '{"fr":"Je teste activement la plate-forme."}']); // Special role intended to test new functionalities
        Role::create(['name' => 'translator', 'description' => '{"fr":"Je traduis des contenus vers le français, ma langue maternelle."}']); // Access content translation requests
        Role::create(['name' => 'reporter', 'description' => '{"fr":"J\'écris des billets pour la plate-forme."}']); // Publish content intended to the community anywhere, anytime 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
