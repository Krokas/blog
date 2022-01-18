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
