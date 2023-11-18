<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndAccess
{
    public function setGateAndPolicyAccess()
    {
        $this->defineGateDashboard();
        $this->defineGateCategory();
        $this->defineGateProduct();
        $this->defineGateOrder();
        $this->defineGateDiscount();
        $this->defineGateSlider();
        $this->defineGateUser();
        $this->defineGateRole();
    }

    public function defineGateDashboard()
    {
        Gate::define('list-dashboard', 'App\Policies\DashboardPolicy@view');
        Gate::define('add-dashboard', 'App\Policies\DashboardPolicy@create');
    }

    public function defineGateCategory()
    {
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');
    }

    public function defineGateProduct()
    {
        Gate::define('list-product', 'App\Policies\ProductPolicy@view');
        Gate::define('add-product', 'App\Policies\ProductPolicy@create');
        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');
    }

    public function defineGateOrder()
    {
        Gate::define('list-order', 'App\Policies\OrderPolicy@view');
        Gate::define('add-order', 'App\Policies\OrderPolicy@create');
        Gate::define('edit-order', 'App\Policies\OrderPolicy@update');
        // Gate::define('delete-order', 'App\Policies\OrderPolicy@delete');
    }

    public function defineGateDiscount()
    {
        Gate::define('list-discount', 'App\Policies\DiscountPolicy@view');
        Gate::define('add-discount', 'App\Policies\DiscountPolicy@create');
        Gate::define('edit-discount', 'App\Policies\DiscountPolicy@update');
        Gate::define('delete-discount', 'App\Policies\DiscountPolicy@delete');
    }

    public function defineGateSlider()
    {
        Gate::define('list-slider', 'App\Policies\SliderPolicy@view');
        Gate::define('add-slider', 'App\Policies\SliderPolicy@create');
        Gate::define('edit-slider', 'App\Policies\SliderPolicy@update');
        Gate::define('delete-slider', 'App\Policies\SliderPolicy@delete');
    }

    public function defineGateUser()
    {
        Gate::define('list-user', 'App\Policies\UserPolicy@view');
        Gate::define('add-user', 'App\Policies\UserPolicy@create');
        Gate::define('edit-user', 'App\Policies\UserPolicy@update');
        Gate::define('delete-user', 'App\Policies\UserPolicy@delete');
    }
    public function defineGateRole()
    {
        Gate::define('list-role', 'App\Policies\RolePolicy@view');
        Gate::define('add-role', 'App\Policies\RolePolicy@create');
        Gate::define('edit-role', 'App\Policies\RolePolicy@update');
        Gate::define('delete-role', 'App\Policies\RolePolicy@delete');
    }
}
