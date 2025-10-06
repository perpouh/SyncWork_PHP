<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 2;
    case MANAGER = 1;
    case USER = 0;
}