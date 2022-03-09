<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Imatek',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Imatek</b> CP',
    'logo_img' => 'vendor\adminlte\dist\img\AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-1',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'ImatekLogo',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */
    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-fw text-light',
    'classes_auth_btn' => 'btn-flat btn-light',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => 'sidebar-dark-danger elevation-4',
    'classes_topnav' => 'navbar-dark navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => false,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Buscar',
        ],
/*         [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Articulos',
            'url'         => '/articulos',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
            'can'         =>'Crear articulos'
        ], */

        [
            'text'    => 'Gestión de usuarios',
            'icon'    => 'none',
            'submenu' => [


                    [
                        'text' => 'Lista Usuarios',
                        'url'  => '/users2',
                        'icon'    => 'fa fa-angle-right',
                    ],
                    [
                        'text' => 'Crear Usuarios',
                        'url'  => '/users2/create',
                        'icon'    => 'fa fa-angle-right',
                        'can'=> 'Crear usuarios'
                    ],


/*                     [
                        'text'    => 'Roles',
                        'url'     => '#',
                        'icon'    => 'none',
                        'submenu' => [
                        [
                            'text' => 'Asignar Roles',
                            'url'  => '/users',
                            'icon'    => 'none',
                        ],
                        [
                            'text' => 'Crear Roles',
                            'url'  => '/roles/create',
                            'icon'    => 'none',
                        ],
                    ],

                ], */

                ],
            'can'=>'Ver lista de usuarios',
            /* ,
            'can'=>'Editar usuarios',
            'can'=>'Eliminar usuarios' */





        ],
        [
            'text'    => 'Gestión de roles',
            'icon'    => 'none',
            'submenu' => [


                    [
                        'text' => 'Lista Roles',
                        'url'  => '/roles',
                        'icon'    => 'fa fa-angle-right',
                        'can'  =>'Ver roles',
                    ],
                    [
                        'text' => 'Asignar Roles',
                        'url'  => '/users',
                        'icon'    => 'fa fa-angle-right',
                        'can'  =>'Asignar roles',
                    ],
                    [
                        'text' => 'Crear Roles',
                        'url'  => '/roles/create',
                        'icon'    => 'fa fa-angle-right',
                        'can'  => 'Crear roles',
                    ],


                ],
            'can'=>'Ver roles',






        ],

        [
                    'text'    => 'Gestión Equipos',
                    'url'     => '#',
                    'icon'    => 'none',
                    'submenu' => [
                        [
                            'text'    => 'Lista Equipos',
                            'url'     => '/equipos/',
                            'icon'    => 'fa fa-angle-right',
                            'can'     =>'Ver lista de equipos',
                        ],
                        [
                            'text'    => 'Agregar Equipo',
                            'url'     => '/equipos/create',
                            'icon'    => 'fa fa-angle-right',
                            'can'     => 'Crear equipos',
                        ],
                        ],
                    'can'=> 'Ver lista de equipos',


            ],

                [

                    'text'    => 'Gestión Mantenciones',
                    'url'     => '#',
                    'icon'    => 'none',
                    'submenu' => [
                            [
                                'text'    => 'Lista Mantenciones',
                                'url'     => '/mantenciones',
                                'icon'    => 'fa fa-angle-right',
                                'can'     => 'Ver lista de mantenciones',
                            ],
                            [
                                'text'    => 'Agregar a mantención',
                                'url'     => '/mantenciones/create',
                                'icon'    => 'fa fa-angle-right',
                                'can'     => 'Crear mantención',
                            ],



                        ],
                    'can'=> 'Ver lista de mantenciones',
],


[
    'text'    => 'Gestión Movimientos',
    'icon'    => 'none',
    'submenu' => [


        [
            'text'    => 'Lista Movimientos',
            'url'     => '/movimientos',
            'icon'    => 'fa fa-angle-right',
            'can'     =>   'Ver lista de movimientos',
        ],


        [
            'text'    => 'Agregar Movimientos',
            'url'     => '/movimientos/create',
            'icon'    => 'fa fa-angle-right',
            'can'     => 'Crear movimiento'

        ],

    ],
    'can'=>'Ver lista de movimientos',

],





[
    'text'    => 'Gestión Centros',
    'icon'    => 'none',
    'submenu' => [


        [
            'text'    => 'Lista Centros',
            'url'     => '/centros',
            'icon'    => 'fa fa-angle-right',
            'can'     => 'Ver lista de centros'
        ],


        [
            'text'    => 'Agregar Centro',
            'url'     => '/centros/create',
            'icon'    => 'fa fa-angle-right',
            'can'     => 'Crear centros'

       ],

    ],
    'can'=> 'Ver lista de centros',

],
[
    'text'    => 'Gestión Clientes',
    'icon'    => 'none',
    'submenu' => [


        [
            'text'    => 'Lista Clientes',
            'url'     => '/clientes',
            'icon'    => 'fa fa-angle-right',
            'can'=> 'Ver lista de clientes',
        ],


        [
            'text'    => 'Agregar Cliente',
            'url'     => '/clientes/create',
            'icon'    => 'fa fa-angle-right',
            'can'=> 'Crear cliente',

       ],

    ],
    'can'=> 'Ver lista de clientes',

],

[
    'text'    => 'Gestión Proveedores',
    'icon'    => 'none',
    'submenu' => [


        [
            'text'    => 'Lista Proveedores',
            'url'     => '/proveedores',
            'icon'    => 'fa fa-angle-right',

        ],


        [
            'text'    => 'Agregar Proveedores',
            'url'     => '/proveedores/create',
            'icon'    => 'fa fa-angle-right',


        ],

    ],


],



        [
            'text'    => 'Registro de actividad',
            'icon'    => 'none',
            'url'     => '/admin/user-activity',
            'can'     => 'Ver actividad de usuario'

        ],
	/*

        ['header' => 'Configuración de la cuenta'],
        [
            'text' => 'Perfil de usuario',
            'url'  => 'user/profile',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ], */

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
