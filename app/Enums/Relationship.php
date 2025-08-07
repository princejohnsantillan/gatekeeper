<?php

namespace App\Enums;

enum Relationship: string
{
    case Father = 'father';
    case Mother = 'mother';
    case Uncle = 'uncle';
    case Aunt = 'aunt';
    case Grandfather = 'grandfather';
    case Grandmother = 'grandmother';
    case Guardian = 'guardian';
}
