<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 0;
    case MANAGER = 1;
    case USER = 2;
}