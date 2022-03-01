<?php

namespace App\Http\Controllers\Api\V1\Membership;

use App\Http\Controllers\Controller;
use App\Infrastructure\Auth\Password\ResetPasswords;

class ResetPasswordController extends Controller
{
    use ResetPasswords;
}
