<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(AdminsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleTranslationsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
//        $this->call(MenusTableSeeder::class);
//        $this->call(MenuItemsTableSeeder::class);
//        $this->call(MenuItemTranslationsTableSeeder::class);
//        $this->call(MenuTranslationsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PageTranslationsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(PositionTranslationsTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SimpleItemsTableSeeder::class);
        $this->call(SimpleItemTranslationsTableSeeder::class);
    }
}
