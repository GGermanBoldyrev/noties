<?php

namespace app\Enums;

// Enum для упрощения работы с правилами
enum Rule: string
{
    case required = "This field is required";
    case email = "You must provide a valid email address";
    case max = "Maximum  length of this field is {max}";
    case min = 'Minimum  length of this field is {min}';
    case match = 'This field must be the same as {match}';
}
