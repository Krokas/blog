<?php

return [
    'labels' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'previous' => 'Previous',
        'next' => 'Next',
        'emptySelect' => 'Not Selected'
    ],
    'login' => [
        'h1' => 'Login',
        'submit' => 'Log in',
        'authenticate' => [
            'failed' => 'User email or password is incorrect.'
        ]
        ],
    'user' => [
        'created' => 'User has been created.',
        'exists' => 'User already exists.',
        'verify' => [
            'title' => 'Account verification',
            'h1' => 'Verify your account',
            'preamble' => 'By filling fields below and submitting the form for verification you will finalize your account creation.',
            'submit' => 'Verify'
        ]
    ],
    'sidebar' => [
        'dashboard' => 'Dashboard',
        'posts' => 'Posts',
        'images' => 'Images',
        'personal' => 'Personal',
        'profile' => 'Profile',
        'logout' => 'Log-out',
        'settings' => 'Settings',
        'categories' => 'Categories',
        'post' => [
            'heading' => 'Post control',
            'save' => 'Save'
        ]
    ],
    'header' => [
        'search' => [
            'placeholder' => 'Search'
        ]
    ],
    'dashboard' => [
        'title' => 'Dashboard',
        'h1' => 'Dashboard'
    ],
    'post' => [
        'title' => 'Title',
        'slug' => 'Slug',
        'image' => 'Image',
        'category' => 'Category',
        'create' => [
            'title' => 'New post',
            'h1' => 'New post'
        ],
        'delete' => [
            'confirm' => 'Do you really want to delete this post?'
        ],
        'list' => [
            'title' => 'Posts',
            'h1' => 'Posts',
            'active' => 'Status',
            'actions' => 'Actions',
            'published' => 'Published',
            'draft' => 'Draft',
            'publish' => 'Publish',
            'unpublish' => 'Unpublish',
            'delete' => 'Delete'
        ],
        'errors' => [
            'no-posts' => [
                'title' => 'No posts',
                'preamble' => 'Create a post and you will find it here after saving.'
            ]
        ]
    ],
    'image' => [
        'list' => [
            'h1' => 'Images',
            'title' => 'Images',
            'add' => 'New Image',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'create' => [
            'h1' => 'New Image',
            'title' => 'Add new image',
            'submit' => 'Submit',
            'labels' => [
                'title' => 'Title (alt text)',
                'image' => 'Image'
            ]
        ],
        'update' => [
            'h1' => 'Update image',
            'title' => 'Update image'
        ],
        'errors' => [
            'no-images' => [
                'title' => 'There are no images',
                'preamble' => 'Upload some images and you will see them here.'
            ]
        ]
    ],
    'settings' => [
        'h1' => 'Settings',
        'title' => 'Site settings',
        'privacy' => [
            'consent' => [
                'h2' => 'Consent Modal',
                'title' => 'Title',
                'body' => 'Text body',
                'submit' => 'Save Consent Modal'
            ],
            'privacy' => [
                'h2' => 'Privacy',
                'body_label' => 'Privacy rules',
                'submit' => 'Save privacy rules'
            ]
        ]
    ],
    'category' => [
        'list' => [
            'title' => 'Categories',
            'add' => 'Add category'
        ],
        'create' => [
            'title' => 'New Category',
            'submit' => 'Save category'
        ],
        'update' => [
            'title' => 'Update category'
        ],
        'form' => [
            'name' => 'Name',
            'slug' => 'Slug'
        ],
        'list' => [
            'actions' => 'Actions',
            'delete' => 'Delete',
            'add' => 'New category',
            'title' => 'Categories'
        ],
        'confirm' => [
            'delete' => 'Do you really want to delete this category?'
        ],
        'errors' => [
            'no-categories' => [
                'title' => 'No categories',
                'preamble' => 'There are no categories. Before creating a post there needs to be atleast one category to assign post to.'
            ]
        ]
    ]
];
