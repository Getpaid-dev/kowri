<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles (use firstOrCreate to prevent duplicates)
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
    
        // Create permissions (use firstOrCreate to prevent duplicates)
        $viewTransactions = Permission::firstOrCreate(['name' => 'view transactions']);
        $approveDeposits = Permission::firstOrCreate(['name' => 'approve deposits']);
        $manageUsers = Permission::firstOrCreate(['name' => 'manage users']);
        $viewManagerDashboard = Permission::firstOrCreate(['name' => 'view manager dashboard']);
        $viewAdminDashboard = Permission::firstOrCreate(['name' => 'view admin dashboard']);
        $assignRoles = Permission::firstOrCreate(['name' => 'assign roles']);
        $viewScreenshots = Permission::firstOrCreate(['name' => 'view screenshots']);
        
        // New permissions
        $changeUserBalance = Permission::firstOrCreate(['name' => 'change user balance']);
        $viewOtherUsersTransactions = Permission::firstOrCreate(['name' => 'view other users transactions']);
    
        // Assign permissions to roles
        $adminRole->givePermissionTo([
            $viewTransactions,
            $approveDeposits,
            $manageUsers,
            $viewManagerDashboard,
            $viewAdminDashboard,
            $assignRoles,
            $viewScreenshots,
            $changeUserBalance, // Admin can change balance
            $viewOtherUsersTransactions, // Admin can view all users' transactions
        ]);

        $managerRole->givePermissionTo([
            $viewTransactions,
            $approveDeposits,
            $viewManagerDashboard,
            $viewAdminDashboard,
            $changeUserBalance, // Manager can change balance
            $viewOtherUsersTransactions, // Manager can view all users' transactions
        ]);
        
        $userRole->givePermissionTo([$viewTransactions]); // Regular users can only view transactions
    
        // Create demo users and assign roles
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);
        $admin->assignRole('admin'); // Assign the admin role
        $admin->givePermissionTo([
            $viewTransactions,
            $approveDeposits,
            $manageUsers,
            $viewManagerDashboard,
            $viewAdminDashboard,
            $assignRoles,
            $viewScreenshots,
            $changeUserBalance,
            $viewOtherUsersTransactions,
        ]);

        // Create some test users and assign roles
        $manager = User::create([
            'name' => 'Sure God',
            'email' => 'suregod@gmail.com',
            'password' => bcrypt('password123'),
        ]);
        $manager->assignRole('manager');
        $manager->givePermissionTo([
            $viewTransactions,
            $approveDeposits,
            $viewManagerDashboard,
            $changeUserBalance,
            $viewOtherUsersTransactions,
        ]);
    
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);
        $user->assignRole('user'); // Assign the user role
    }
}
