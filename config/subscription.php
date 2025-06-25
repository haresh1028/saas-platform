<?php

return [
    'plans' => [
        'free' => [
            'name' => 'Free',
            'max_projects' => 1,
            'can_assign_teams' => false,
        ],
        'basic' => [
            'name' => 'Basic',
            'max_projects' => 5,
            'can_assign_teams' => true,
        ],
        'premium' => [
            'name' => 'Premium',
            'max_projects' => -1, // unlimited
            'can_assign_teams' => true,
        ],
    ],
];