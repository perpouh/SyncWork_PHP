<?php

namespace App\Enums;

enum TicketType: string
{
    case BUGFIX = 'bugfix';
    case FEATURE = 'feature';
    case TASK = 'task';
    case UNCATEGORIZED = 'uncategorized';
}
