<?php

namespace App\Enums;

use App\Models\Role;

enum RoleEnum: string
{
    case SUPER_ADMIN = "super_admin";
    case ADMIN = "admin";
    case EARLY_ACCESS = "early_access";
    case APPROVED = "approved";
    case PRE_APPROVED = "pre_approved";

    /**
     * @return string
     */
    public function getRole(): string
    {
        return match($this)
        {
            self::SUPER_ADMIN => __("super admin"),
            self::ADMIN => __("admin"),
            self::EARLY_ACCESS => __("early access"),
            self::APPROVED => __("approved"),
            self::PRE_APPROVED => __("pre approved"),
        };
    }
}

