<?php 
 
return [
    'language'            => 'Language',
    'actions'             => 'Actions',
    'general'             => 'General',
    'no_results'          => 'No results available',
    'search'              => 'Search',
    'validate'            => 'Validate',
    'choose_file'         => 'Choose File',
    'no_file_chosen'      => 'No file chosen',
    'are_you_sure'        => 'Are you sure ?',
    'delete_image'        => 'Delete image',
    'yes'                 => 'Yes',
    'no'                  => 'No',
    'add_new'             => 'Add',
    'export'              => 'Export',
    'more_info'           => 'More info',
    'author'              => 'Author',
    'author_id'           => 'Author ID',
    'last_access_at'      => 'Last access at',
    'published_at'        => 'Published at',
    'created_at'          => 'Created at',
    'updated_at'          => 'Updated at',
    'deleted_at'          => 'Deleted at',
    'no_value'            => 'No value',
    'upload_image'        => 'Upload image',
    'anonymous'           => 'Anonymous',
    'all_rights_reserved' => 'All rights reserved.',
    'with'                => 'with',
    'by'                  => 'by',

    'datatables' => [
        'no_results'         => 'No results available',
        'no_matched_results' => 'No matched results available',
        'show_per_page'      => 'Show',
        'entries_per_page'   => 'entries per page',
        'search'             => 'Search',
        'infos'              => 'Showing :offset_start to :offset_end of :total entries',
    ],

    'morphs' => [
        'post' => 'Post, identity :id',
        'user' => 'User, identity :id',
    ],

    'auth' => [
        'disabled' => 'Your account has been disabled.',
    ],

    'http' => [
        '403' => [
            'title'       => 'Access Denied',
            'description' => 'Sorry, but you do not have permissions to access this page.',
        ],
        '404' => [
            'title'       => 'Page Not Found',
            'description' => 'Sorry, but the page you were trying to view does not exist.',
        ],
        '500' => [
            'title'       => 'Server Error',
            'description' => 'Sorry, but the server has encountered a situation it doesn\'t know how to handle. We\'ll fix this as soon as possible.',
        ],
    ],

    'localization' => [
        'en' => 'English',
        'fr' => 'French',
        'es' => 'Spanish',
    ],

    'placeholders' => [
        'route' => 'Select a valid internal route',
        'tags'  => 'Select or create a tag',
    ],

    'cookieconsent' => [
        'message' => 'This website uses cookies to ensure you get the best experience on our website.',
        'dismiss' => 'Got it !',
    ],

    'descriptions' => [
        'allowed_image_types' => 'Allowed types: png gif jpg jpeg.',
    ],

    'user' => [
        'dashboard'                 => 'Dashboard',
        'remember'                  => 'Remember',
        'login'                     => 'Login',
        'logout'                    => 'Logout',
        'password_forgot'           => 'Forget password ?',
        'send_password_link'        => 'Send reset password link',
        'password_reset'            => 'Password Reset',
        'register'                  => 'Register',
        'space'                     => 'My space',
        'settings'                  => 'Settings',
        'account'                   => 'My account',
        'profile'                   => 'My profile',
        'avatar'                    => 'Avatar',
        'online'                    => 'Online',
        'edit_profile'              => 'Edit my profile',
        'change_password'           => 'Change my password',
        'delete'                    => 'Delete my account',
        'administration'            => 'Administration',
        'member_since'              => 'Member since :date',
        'profile_updated'           => 'Profile successfully updated.',
        'password_updated'          => 'Password successfully updated.',
        'super_admin'               => 'Super administrateur',

        'account_delete'  => '<p>This action will delete entirely your account from this site as well as all associated data.</p>',
        'account_deleted' => 'Account successfully deleted',

        'titles' => [
            'space'   => 'My space',
            'account' => 'My account',
        ],
    ],

    'alerts' => [
        'login_as'      => 'You are actually logged as <strong>:name</strong>, you can logout as <a href=":route" data-turbolinks="false">:admin</a>.',
    ],

    'backend' => [
        'dashboard' => [
            'unallocated_jobcards'           => 'Unallocated Jobcards',
            'jobcards_in_progress'            => 'Jobcards in Progress',
            'completed_jobcards'              => 'Completed Jobcards',
            'quoted_jobcards'                => 'Quoted Jobcards',
            'invoiced_jobcards'              => 'Invoiced Jobcards',
            'quoted_amount' => 'Quote Amount',
            'invoiced_amount' => 'Invoice Amount',
            'last_posts'           => 'Last posts',
            'last_published_posts' => 'Last publications',
            'last_pending_posts'   => 'Last pending posts',
            'last_new_posts'       => 'Last new posts',
            'all_posts'            => 'All posts',
        ],

        'new_menu' => [
            'post'         => 'New post',
            'form_setting' => 'New form setting',
            'user'         => 'New user',
            'role'         => 'New role',
            'meta'         => 'New meta',
            'redirection'  => 'New redirection',
        ],

        'sidebar' => [
            'content' => 'Content management',
            'forms'   => 'Form management',
            'access'  => 'Access management',
            'seo'     => 'SEO settings',
        ],

        'titles' => [
            'dashboard' => 'Dashboard',
        ],

        'users' => [
            'titles' => [
                'main'   => 'User',
                'index'  => 'User list',
                'create' => 'User creation',
                'edit'   => 'User modification',
            ],

            'actions' => [
                'destroy' => 'Delete selected users',
                'enable'  => 'Enable selected users',
                'disable' => 'Disable selected users',
            ],
        ],

        'roles' => [
            'titles' => [
                'main'   => 'Role',
                'index'  => 'Role list',
                'create' => 'Role creation',
                'edit'   => 'Role modification',
            ],
        ],

        'metas' => [
            'titles' => [
                'main'   => 'Meta',
                'index'  => 'Meta list',
                'create' => 'Meta creation',
                'edit'   => 'Meta modification',
            ],

            'actions' => [
                'destroy' => 'Delete selected metas',
            ],
        ],

        'form_submissions' => [
            'titles' => [
                'main'  => 'Submission',
                'index' => 'Submission list',
                'show'  => 'Submission detail',
            ],

            'actions' => [
                'destroy' => 'Delete selected submissions',
            ],
        ],

        'form_settings' => [
            'titles' => [
                'main'   => 'Forms',
                'index'  => 'Form setting list',
                'create' => 'Form setting creation',
                'edit'   => 'Form setting modification',
            ],

            'descriptions' => [
                'recipients' => 'Example: \'webmaster@example.com\' or \'sales@example.com,support@example.com\' . To specify multiple recipients, separate each email address with a comma.',
                'message'    => 'The message to display to the user after submission of this form. Leave blank for no message.',
            ],
        ],

        'redirections' => [
            'titles' => [
                'main'   => 'Redirection',
                'index'  => 'Redirection list',
                'create' => 'Redirection creation',
                'edit'   => 'Redirection modification',
            ],

            'actions' => [
                'destroy' => 'Delete selected redirections',
                'enable'  => 'Enable selected redirections',
                'disable' => 'Disable selected redirections',
            ],

            'types' => [
                'permanent' => 'Permanent redirect (301)',
                'temporary' => 'Temporary redirect (302)',
            ],

            'import' => [
                'title'       => 'CSV file import',
                'label'       => 'Select CSV file to import',
                'description' => 'File must have 2 columns with "source" and "target" as heading, redirection will be permanent by default',
            ],
        ],

        'posts' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Posts',
                'index'       => 'Post list',
                'create'      => 'Create post',
                'edit'        => 'Edit post',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of article\' title by default.',
                'meta_description' => 'If leave empty, description will be that of article\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Article\'s title.',
                'meta_description' => 'Article\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected posts',
                'publish' => 'Publish selected posts',
                'pin'     => 'Pin selected posts',
                'promote' => 'Promote selected posts',
            ],
        ],

        'jobcards' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Jobcards',
                'index'       => 'Jobcard list',
                'create'      => 'Create Jobcard',
                'edit'        => 'Edit Jobcard',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of jobcard\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of jobcard\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Jobcard\'s title.',
                'meta_description' => 'Jobcard\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected jobcards',
                'publish' => 'Publish selected jobcards',
                'pin'     => 'Pin selected jobcards',
                'promote' => 'Promote selected jobcards',
            ],
        ],

        'projects' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Projects',
                'index'       => 'Project list',
                'create'      => 'Create Project',
                'edit'        => 'Edit Project',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of project\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of project\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Projects\'s title.',
                'meta_description' => 'Projects\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected projects',
                'publish' => 'Publish selected projects',
                'pin'     => 'Pin selected projects',
                'promote' => 'Promote selected projects',
            ],
        ],

        'project_managers' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Project Managers',
                'index'       => 'Project Managers list',
                'create'      => 'Create Project Managers',
                'edit'        => 'Edit Project Managers',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Project Manager\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Project Manager\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Projects Manager\'s title.',
                'meta_description' => 'Projects Manager\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected project managers',
                'publish' => 'Publish selected project managers',
                'pin'     => 'Pin selected project managers',
                'promote' => 'Promote selected project managers',
            ],
        ],

        'labour_rates' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Labour Rates',
                'index'       => 'Labour Rates list',
                'create'      => 'Create Labour Rates',
                'edit'        => 'Edit Labour Rates',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Labour Rate\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Labour Rate\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Labour Rate\'s title.',
                'meta_description' => 'Labour Rate\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected labour rates',
                'publish' => 'Publish selected labour rates',
                'pin'     => 'Pin selected labour rates',
                'promote' => 'Promote selected labour rates',
            ],
        ],

        'materials_rates' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Material Rates',
                'index'       => 'Material Rates list',
                'create'      => 'Create Material Rates',
                'edit'        => 'Edit Material Rates',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Material Rate\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Material Rate\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Material Rate\'s title.',
                'meta_description' => 'Material Rate\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected material rates',
                'publish' => 'Publish selected material rates',
                'pin'     => 'Pin selected material rates',
                'promote' => 'Promote selected material rates',
            ],
        ],

        'vat' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Vat',
                'index'       => 'Vat list',
                'create'      => 'Create Vat',
                'edit'        => 'Edit Vats',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Vat\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Vat\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Vat\'s title.',
                'meta_description' => 'Vat\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected vats',
                'publish' => 'Publish selected vats',
                'pin'     => 'Pin selected vats',
                'promote' => 'Promote selected vats',
            ],
        ],

        'reports' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Report',
                'index'       => 'Report list',
                'create'      => 'Create Report',
                'edit'        => 'Edit Reports',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Report\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Report\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Report\'s title.',
                'meta_description' => 'Report\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected reports',
                'publish' => 'Publish selected reports',
                'pin'     => 'Pin selected reports',
                'promote' => 'Promote selected reports',
            ],
        ],

        'settings' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Setting',
                'index'       => 'Setting list',
                'create'      => 'Create Setting',
                'edit'        => 'Edit Settings',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Setting\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Setting\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Setting\'s title.',
                'meta_description' => 'Setting\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected settings',
                'publish' => 'Publish selected settings',
                'pin'     => 'Pin selected settings',
                'promote' => 'Promote selected settings',
            ],
        ],

        'invoices' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Invoice',
                'index'       => 'Invoice list',
                'create'      => 'Create Invoice',
                'edit'        => 'Edit Invoices',
                'show'        => 'View Invoice',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Invoice\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Invoice\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Invoice\'s title.',
                'meta_description' => 'Invoice\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected invoices',
                'publish' => 'Publish selected invoices',
                'pin'     => 'Pin selected invoices',
                'promote' => 'Promote selected invoices',
            ],

        ],
 
        'district' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Districts',
                'index'       => 'District list',
                'create'      => 'Create District',
                'edit'        => 'Edit District',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of project\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of project\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Projects\'s title.',
                'meta_description' => 'Projects\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected District',
                'publish' => 'Publish selected Districts',
                'pin'     => 'Pin selected projects',
                'promote' => 'Promote selected projects',
            ],
        ],

        'subdistrict' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Sub District',
                'index'       => 'Sub District list',
                'create'      => 'Create Sub District',
                'edit'        => 'Edit Sub District',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of project\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of project\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Projects\'s title.',
                'meta_description' => 'Projects\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected SubDistrict',
                'publish' => 'Publish selected SubDistricts',
                'pin'     => 'Pin selected projects',
                'promote' => 'Promote selected projects',
            ],
        ],

        'clients' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Clients',
                'index'       => 'Clients list',
                'create'      => 'Create Clients',
                'edit'        => 'Edit Clients',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of project\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of project\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Client\'s title.',
                'meta_description' => 'Client\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected Client',
                'publish' => 'Publish selected Clients',
                'pin'     => 'Pin selected projects',
                'promote' => 'Promote selected projects',
            ],
        ],

        'quotes' => [
            'statuses' => [
                'draft'     => 'Draft',
                'pending'   => 'Pending',
                'published' => 'Published',
            ],

            'titles' => [
                'main'        => 'Quote',
                'index'       => 'Quote list',
                'create'      => 'Create Quote',
                'edit'        => 'Edit quotes',
                'show'        => 'View Quote',
                'publication' => 'Publication options',
            ],

            'descriptions' => [
                'meta_title'       => 'If leave empty, title will be that of Quote\'s title by default.',
                'meta_description' => 'If leave empty, description will be that of Quote\'s summary by default.',
            ],

            'placeholders' => [
                'body'             => 'Write your content...',
                'meta_title'       => 'Quote\'s title.',
                'meta_description' => 'Quote\'s summary.',
            ],

            'actions' => [
                'destroy' => 'Delete selected quotes',
                'publish' => 'Publish selected quotes',
                'pin'     => 'Pin selected quotes',
                'promote' => 'Promote selected quotes',
            ],
        ],
    ],

    'frontend' => [
        'titles' => [
            'home'           => 'Home',
            'about'          => 'About',
            'contact'        => 'Contact',
            'blog'           => 'Blog',
            'message_sent'   => 'Message sent',
            'legal_mentions' => 'Legal mentions',
            'administration' => 'Administration',
        ],

        'submissions' => [
            'message_sent' => '<p>Your message has been successfully sent</p>',
        ],

        'placeholders' => [
            'locale'   => 'Select your language',
            'timezone' => 'Select your timezone',
        ],

        'blog' => [
            'published_at'                     => 'Published at :date',
            'published_at_with_owner_linkable' => 'Published at :date by <a href=":link">:name</a>',
            'tags'                             => 'Tags',
        ],
    ],
];
