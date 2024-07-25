<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'sport_access',
            ],
            [
                'id'    => 20,
                'title' => 'sport_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'sport_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'sport_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'sport_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'sport_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'add_sport_create',
            ],
            [
                'id'    => 26,
                'title' => 'add_sport_edit',
            ],
            [
                'id'    => 27,
                'title' => 'add_sport_show',
            ],
            [
                'id'    => 28,
                'title' => 'add_sport_delete',
            ],
            [
                'id'    => 29,
                'title' => 'add_sport_access',
            ],
            [
                'id'    => 30,
                'title' => 'event_access',
            ],
            [
                'id'    => 31,
                'title' => 'add_event_create',
            ],
            [
                'id'    => 32,
                'title' => 'add_event_edit',
            ],
            [
                'id'    => 33,
                'title' => 'add_event_show',
            ],
            [
                'id'    => 34,
                'title' => 'add_event_delete',
            ],
            [
                'id'    => 35,
                'title' => 'add_event_access',
            ],
            [
                'id'    => 36,
                'title' => 'contestant_access',
            ],
            [
                'id'    => 37,
                'title' => 'contestant_category_create',
            ],
            [
                'id'    => 38,
                'title' => 'contestant_category_edit',
            ],
            [
                'id'    => 39,
                'title' => 'contestant_category_show',
            ],
            [
                'id'    => 40,
                'title' => 'contestant_category_delete',
            ],
            [
                'id'    => 41,
                'title' => 'contestant_category_access',
            ],
            [
                'id'    => 42,
                'title' => 'add_contestant_create',
            ],
            [
                'id'    => 43,
                'title' => 'add_contestant_edit',
            ],
            [
                'id'    => 44,
                'title' => 'add_contestant_show',
            ],
            [
                'id'    => 45,
                'title' => 'add_contestant_delete',
            ],
            [
                'id'    => 46,
                'title' => 'add_contestant_access',
            ],
            [
                'id'    => 47,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 48,
                'title' => 'add_gallery_create',
            ],
            [
                'id'    => 49,
                'title' => 'add_gallery_edit',
            ],
            [
                'id'    => 50,
                'title' => 'add_gallery_show',
            ],
            [
                'id'    => 51,
                'title' => 'add_gallery_delete',
            ],
            [
                'id'    => 52,
                'title' => 'add_gallery_access',
            ],
            [
                'id'    => 53,
                'title' => 'video_access',
            ],
            [
                'id'    => 54,
                'title' => 'featured_video_create',
            ],
            [
                'id'    => 55,
                'title' => 'featured_video_edit',
            ],
            [
                'id'    => 56,
                'title' => 'featured_video_show',
            ],
            [
                'id'    => 57,
                'title' => 'featured_video_delete',
            ],
            [
                'id'    => 58,
                'title' => 'featured_video_access',
            ],
            [
                'id'    => 59,
                'title' => 'media_coverage_access',
            ],
            [
                'id'    => 60,
                'title' => 'add_medium_create',
            ],
            [
                'id'    => 61,
                'title' => 'add_medium_edit',
            ],
            [
                'id'    => 62,
                'title' => 'add_medium_show',
            ],
            [
                'id'    => 63,
                'title' => 'add_medium_delete',
            ],
            [
                'id'    => 64,
                'title' => 'add_medium_access',
            ],
            [
                'id'    => 65,
                'title' => 'review_access',
            ],
            [
                'id'    => 66,
                'title' => 'add_review_create',
            ],
            [
                'id'    => 67,
                'title' => 'add_review_edit',
            ],
            [
                'id'    => 68,
                'title' => 'add_review_show',
            ],
            [
                'id'    => 69,
                'title' => 'add_review_delete',
            ],
            [
                'id'    => 70,
                'title' => 'add_review_access',
            ],
            [
                'id'    => 71,
                'title' => 'faq_access',
            ],
            [
                'id'    => 72,
                'title' => 'add_faq_create',
            ],
            [
                'id'    => 73,
                'title' => 'add_faq_edit',
            ],
            [
                'id'    => 74,
                'title' => 'add_faq_show',
            ],
            [
                'id'    => 75,
                'title' => 'add_faq_delete',
            ],
            [
                'id'    => 76,
                'title' => 'add_faq_access',
            ],
            [
                'id'    => 77,
                'title' => 'player_achievement_access',
            ],
            [
                'id'    => 78,
                'title' => 'add_achievement_create',
            ],
            [
                'id'    => 79,
                'title' => 'add_achievement_edit',
            ],
            [
                'id'    => 80,
                'title' => 'add_achievement_show',
            ],
            [
                'id'    => 81,
                'title' => 'add_achievement_delete',
            ],
            [
                'id'    => 82,
                'title' => 'add_achievement_access',
            ],
            [
                'id'    => 83,
                'title' => 'blog_access',
            ],
            [
                'id'    => 84,
                'title' => 'add_blog_create',
            ],
            [
                'id'    => 85,
                'title' => 'add_blog_edit',
            ],
            [
                'id'    => 86,
                'title' => 'add_blog_show',
            ],
            [
                'id'    => 87,
                'title' => 'add_blog_delete',
            ],
            [
                'id'    => 88,
                'title' => 'add_blog_access',
            ],
            [
                'id'    => 89,
                'title' => 'contact_access',
            ],
            [
                'id'    => 90,
                'title' => 'contact_form_create',
            ],
            [
                'id'    => 91,
                'title' => 'contact_form_edit',
            ],
            [
                'id'    => 92,
                'title' => 'contact_form_show',
            ],
            [
                'id'    => 93,
                'title' => 'contact_form_delete',
            ],
            [
                'id'    => 94,
                'title' => 'contact_form_access',
            ],
            [
                'id'    => 95,
                'title' => 'registration_form_access',
            ],
            [
                'id'    => 96,
                'title' => 'add_registration_create',
            ],
            [
                'id'    => 97,
                'title' => 'add_registration_edit',
            ],
            [
                'id'    => 98,
                'title' => 'add_registration_show',
            ],
            [
                'id'    => 99,
                'title' => 'add_registration_delete',
            ],
            [
                'id'    => 100,
                'title' => 'add_registration_access',
            ],
            [
                'id'    => 101,
                'title' => 'player_detail_access',
            ],
            [
                'id'    => 102,
                'title' => 'add_player_create',
            ],
            [
                'id'    => 103,
                'title' => 'add_player_edit',
            ],
            [
                'id'    => 104,
                'title' => 'add_player_show',
            ],
            [
                'id'    => 105,
                'title' => 'add_player_delete',
            ],
            [
                'id'    => 106,
                'title' => 'add_player_access',
            ],
            [
                'id'    => 107,
                'title' => 'school_access',
            ],
            [
                'id'    => 108,
                'title' => 'add_school_create',
            ],
            [
                'id'    => 109,
                'title' => 'add_school_edit',
            ],
            [
                'id'    => 110,
                'title' => 'add_school_show',
            ],
            [
                'id'    => 111,
                'title' => 'add_school_delete',
            ],
            [
                'id'    => 112,
                'title' => 'add_school_access',
            ],
            [
                'id'    => 113,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
