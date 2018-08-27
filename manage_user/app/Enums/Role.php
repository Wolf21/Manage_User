<?php
/**
 * Created by PhpStorm.
 * User: cuongnq
 * Date: 27/08/2018
 * Time: 14:45
 */

namespace App\Enums;


use MyCLabs\Enum\Enum;
class Role extends Enum
{
    const ADMIN = 1;
    const USER = 0;
}