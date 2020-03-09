<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {
        $this->registerPolicies();
        Gate::define('assign_assignment','App\Policies\TaskManagementPolicy@assignAssignment');
        Gate::define('complete_assignment','App\Policies\TaskManagementPolicy@completeAssignment');
        Gate::define('all_employee','App\Policies\EmployeeManagementPolicy@allEmployee');
        Gate::define('create_employee','App\Policies\EmployeeManagementPolicy@createEmployee');
        Gate::define('all_appointment','App\Policies\ScheduleManagementPolicy@allAppointment');
        Gate::define('all_fashion','App\Policies\FashionManagementPolicy@allFashion');
        Gate::define('create_fashion','App\Policies\FashionManagementPolicy@createFashion');
        Gate::define('all_assignment','App\Policies\PointManagementPolicy@allAssignment');
        Gate::define('create_assignment','App\Policies\PointManagementPolicy@createAssignment');
        Gate::define('track_complete_assignment','App\Policies\PointManagementPolicy@trackCompleteAssignment');
        Gate::define('recycle_bin','App\Policies\PointManagementPolicy@recycleBin');
        Gate::define('report','App\Policies\PointManagementPolicy@report');
        Gate::define('all_role','App\Policies\RoleManagementPolicy@allRole');
        Gate::define('create_role','App\Policies\RoleManagementPolicy@createRole');
    }
}
