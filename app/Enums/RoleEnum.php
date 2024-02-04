<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = "super_admin";
    case ADMIN = "admin";
    case EARLY_ACCESS = "early_access";
    case APPROVED = "approved";
    case PRE_APPROVED = "pre_approved";
}
