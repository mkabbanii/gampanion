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
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'game_create',
            ],
            [
                'id'    => 24,
                'title' => 'game_edit',
            ],
            [
                'id'    => 25,
                'title' => 'game_show',
            ],
            [
                'id'    => 26,
                'title' => 'game_delete',
            ],
            [
                'id'    => 27,
                'title' => 'game_access',
            ],
            [
                'id'    => 28,
                'title' => 'order_create',
            ],
            [
                'id'    => 29,
                'title' => 'order_edit',
            ],
            [
                'id'    => 30,
                'title' => 'order_show',
            ],
            [
                'id'    => 31,
                'title' => 'order_delete',
            ],
            [
                'id'    => 32,
                'title' => 'order_access',
            ],
            [
                'id'    => 33,
                'title' => 'status_create',
            ],
            [
                'id'    => 34,
                'title' => 'status_edit',
            ],
            [
                'id'    => 35,
                'title' => 'status_delete',
            ],
            [
                'id'    => 36,
                'title' => 'status_access',
            ],
            [
                'id'    => 37,
                'title' => 'review_create',
            ],
            [
                'id'    => 38,
                'title' => 'review_edit',
            ],
            [
                'id'    => 39,
                'title' => 'review_show',
            ],
            [
                'id'    => 40,
                'title' => 'review_delete',
            ],
            [
                'id'    => 41,
                'title' => 'review_access',
            ],
            [
                'id'    => 42,
                'title' => 'wallet_create',
            ],
            [
                'id'    => 43,
                'title' => 'wallet_edit',
            ],
            [
                'id'    => 44,
                'title' => 'wallet_show',
            ],
            [
                'id'    => 45,
                'title' => 'wallet_delete',
            ],
            [
                'id'    => 46,
                'title' => 'wallet_access',
            ],
            [
                'id'    => 47,
                'title' => 'payment_create',
            ],
            [
                'id'    => 48,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 49,
                'title' => 'payment_show',
            ],
            [
                'id'    => 50,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 51,
                'title' => 'payment_access',
            ],
            [
                'id'    => 52,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 53,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 54,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 55,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 56,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 57,
                'title' => 'favorite_create',
            ],
            [
                'id'    => 58,
                'title' => 'favorite_edit',
            ],
            [
                'id'    => 59,
                'title' => 'favorite_show',
            ],
            [
                'id'    => 60,
                'title' => 'favorite_delete',
            ],
            [
                'id'    => 61,
                'title' => 'favorite_access',
            ],
            [
                'id'    => 62,
                'title' => 'withdraw_create',
            ],
            [
                'id'    => 63,
                'title' => 'withdraw_edit',
            ],
            [
                'id'    => 64,
                'title' => 'withdraw_show',
            ],
            [
                'id'    => 65,
                'title' => 'withdraw_delete',
            ],
            [
                'id'    => 66,
                'title' => 'withdraw_access',
            ],
            [
                'id'    => 67,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 68,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 69,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 70,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 71,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 72,
                'title' => 'redemption_create',
            ],
            [
                'id'    => 73,
                'title' => 'redemption_edit',
            ],
            [
                'id'    => 74,
                'title' => 'redemption_show',
            ],
            [
                'id'    => 75,
                'title' => 'redemption_delete',
            ],
            [
                'id'    => 76,
                'title' => 'redemption_access',
            ],
            [
                'id'    => 77,
                'title' => 'announcement_create',
            ],
            [
                'id'    => 78,
                'title' => 'announcement_edit',
            ],
            [
                'id'    => 79,
                'title' => 'announcement_show',
            ],
            [
                'id'    => 80,
                'title' => 'announcement_delete',
            ],
            [
                'id'    => 81,
                'title' => 'announcement_access',
            ],
            [
                'id'    => 82,
                'title' => 'message_create',
            ],
            [
                'id'    => 83,
                'title' => 'message_edit',
            ],
            [
                'id'    => 84,
                'title' => 'message_show',
            ],
            [
                'id'    => 85,
                'title' => 'message_delete',
            ],
            [
                'id'    => 86,
                'title' => 'message_access',
            ],
            [
                'id'    => 87,
                'title' => 'system_setting_access',
            ],
            [
                'id'    => 88,
                'title' => 'system_management_access',
            ],
            [
                'id'    => 89,
                'title' => 'games_and_order_access',
            ],
            [
                'id'    => 90,
                'title' => 'money_matter_access',
            ],
            [
                'id'    => 91,
                'title' => 'gampanion_create',
            ],
            [
                'id'    => 92,
                'title' => 'gampanion_edit',
            ],
            [
                'id'    => 93,
                'title' => 'gampanion_show',
            ],
            [
                'id'    => 94,
                'title' => 'gampanion_delete',
            ],
            [
                'id'    => 95,
                'title' => 'gampanion_access',
            ],
            [
                'id'    => 96,
                'title' => 'banner_create',
            ],
            [
                'id'    => 97,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 98,
                'title' => 'banner_show',
            ],
            [
                'id'    => 99,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 100,
                'title' => 'banner_access',
            ],
            [
                'id'    => 101,
                'title' => 'system_string_create',
            ],
            [
                'id'    => 102,
                'title' => 'system_string_edit',
            ],
            [
                'id'    => 103,
                'title' => 'system_string_show',
            ],
            [
                'id'    => 104,
                'title' => 'system_string_delete',
            ],
            [
                'id'    => 105,
                'title' => 'system_string_access',
            ],
            [
                'id'    => 106,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
