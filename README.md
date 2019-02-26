# Multi-tenant Starter boilerplate
 
This repository puts together the most common building blocks necessary for developing a multi tenant SAAS application using Laravel, thus enabling users to jumpstart their SAAS application development with separate tenant databases.

It provides

- Multi tenancy with separate databases
- Roles & Permissions for users with isAdmin middleware
- A "Super Admin" role with  access across tenants 
- A simple Admin Dashboard starter blade template (layout) if anyone wants an dashboard page as home
- Signup page with captcha (to prevent bot signups) for new tenants
- Session Flash feature in the layout templates for reporting back the action response

## Getting Started

This starter boilerplate is built on Laravel 5.7. Hence, working knowledge of Laravel is required. 


### Prerequisites

Standard requirements for any laravel 5.7 application development is applicable here. Please verify the PHP version, necessary PHP libraries/extensions & MySQL Database availability on your system before proceeding.

Ensure that your apache/nginx setup is configured correctly to support subdomains so that tenants can have their own subdomains. 



### Installing

- Download the repository by cloning it OR in zip format & extract to your project folder
- Change over to project folder
- Run 'composer install' to install the packages used in this project.
```
    composer install     
```
- Copy .env.example to .env & update the necessary parameters.
- Point your web root to the public folder so that the application can be accessed from your system's web server.

Use the php artisan commands in the console to create a new tenant. Answer the prompts to create a tenant. A confirmation email will be sent to the tenant with password reset link for first time login.

```
    php artisan tenant:create 
```

## Features
### Multi Tenancy
> The multi tenancy feature allows you to run multiple websites using the same laravel installation while keeping tenant specific data separate. Each tenant will be able to access their data through their specific subdomain portal.

Refer to **Built With** section for details on Hyn 5.3



### Simple Bootstrap based admin dashboard
> An admin panel is a prerequiste for most applications. Hence, a basic admin panel has been included in the package. It can be used as a layout template, with necessary customization for the left sidebar to include menu items, for your views. 
>
>The dashboard supports responsive design.
>
> .env provides a parameter to specify the layout template to be used. Two templates, namely, default.blade.php & dashboard.blade.php are provided for your reference.

Refer to **Built With** section for details on Bootstrap Sidebar for any modifications or alternate options.


### Flash message support
> As any typical laravel project, even this layout has a flash session support included.
>
>Usage: 
>
     session()->flash('alert', [
         'type' => 'success', 
         'message' => 'Item deleted'
     ]);        
> Use typical bootstrap styles for type, i.e., primary, success, info, danger etc for appropriate color coding of the flash alert. 


## Built With
Some of the key packages used in this boilerplate are:

* [Laravel](https://laravel.com/docs/5.7) - The web framework used
* [Hyn 5.3 Multi-Tenant Package](https://github.com/hyn/multi-tenant) - Multi tenancy management
* [Roles & Permission Package](https://github.com/spatie/laravel-permission) - Associate users with roles and permission
* [Bootstrap Sidebar](https://bootstrapious.com/p/bootstrap-sidebar) Admin panel / dashboard implementation reference.

## Authors

* **Code Reflex** - *Initial work* - [Code-Reflex](https://github.com/code-reflex)

## License

This project is free for anyone who wishes to copy and replicate / customize for their needs as long as they adhere to the license terms & conditions of the packages included.

## Acknowledgments

* [Ashok Gelal](https://blog.usejournal.com/@ashokgelal) for his article on building [Town House](https://blog.usejournal.com/writing-a-full-featured-multi-tenant-laravel-app-from-scratch-a0e1a7350d9d) app using hyn/multi-tenant  
* [Caleb Oki](https://scotch.io/@caleboki) for his article on [User Authorisation](https://scotch.io/tutorials/user-authorization-in-laravel-54-with-spatie-laravel-permission) in Laravel 5.4 with Spatie Laravel-Permission
* [Ondrej](https://bootstrapious.com/about) for his article on [Collapsible sidebar](https://bootstrapious.com/p/bootstrap-sidebar) using Bootstrap 4