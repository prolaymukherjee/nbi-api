<?php

namespace App\Enums;

enum IdeaStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Archive = 'archive';
}
