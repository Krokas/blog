<?php

return [
    'sidebar' => [
        'menu' => [
            'dashboard' => [
                'title' => 'admin.sidebar.dashboard',
                'icon' => 'home',
                'link' => 'admin.dashboard'
            ],
            'posts' => [
                'title' => 'admin.sidebar.posts',
                'icon' => 'framer',
                'link' => 'admin.post.index'
            ],
            'images' => [
                'title' => 'admin.sidebar.images',
                'icon' => 'image',
                'link' => 'admin.image.index'
            ]
        ],
        'personal' => [
            'profile' => [
                'title' => 'admin.sidebar.profile',
                'icon' => 'user',
                'link' => '#'

            ],
            'logout' => [
                'title' => 'admin.sidebar.logout',
                'icon' => 'log-out',
                'link' => 'admin.logout'
            ]
        ]
    ]
];
