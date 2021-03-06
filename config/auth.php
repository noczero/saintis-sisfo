<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    // Auth::guard('admin')->check($credentials)
    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        // Add admin guard
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', //sesuai dengan nama di providers
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],


        // Add siswa guard
        'siswa' => [
            'driver' => 'session',
            'provider' => 'siswas', //sesuai dengan nama di providers
        ],

        'siswa-api' => [
            'driver' => 'token',
            'provider' => 'siswas',
        ],

        // Add guru guard
        'guru' => [
            'driver' => 'session',
            'provider' => 'gurus', //sesuai dengan nama di providers
        ],

        'guru-api' => [
            'driver' => 'token',
            'provider' => 'gurus',
        ],

         // Add siswa guard
        'manager' => [
            'driver' => 'session',
            'provider' => 'managers', //sesuai dengan nama di providers
        ],

        'manager-api' => [
            'driver' => 'token',
            'provider' => 'managers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        //Add admins DB to authenticate
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class, //sesuai dengan nama file Admin di app
        ],

        // Add siswa DB to authenticate
        'siswas' => [
            'driver' => 'eloquent',
            'model' => App\Siswa::class, //sesuai dengan nama file Siswa di app
        ],

        //Add guru
        'gurus' => [
            'driver' => 'eloquent',
            'model' => App\Guru::class, //sesuai dengan nama file Siswa di app
        ],

      //Add managers
        'managers' => [
            'driver' => 'eloquent',
            'model' => App\Manager::class, //sesuai dengan nama file Siswa di app
        ],
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        // untuk password reset sesuaikan dengan nama provideea
       'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 15, //satuan menit
        ],
         'siswas' => [
            'provider' => 'siswas',
            'table' => 'password_resets',
            'expire' => 60, //satuan menit
        ],
        'gurus' => [
            'provider' => 'gurus',
            'table' => 'password_resets',
            'expire' => 60, //satuan menit
        ],
      'managers' => [
            'provider' => 'managers',
            'table' => 'password_resets',
            'expire' => 60, //satuan menit
        ],
    ],

];
