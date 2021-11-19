<?php
/*
 * This file is part of the NEO ERP Application.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

namespace Neo\Core\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Acl
{
    const ROLE_DEVELOPER = 'developer';
    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_ADMIN = 'admin';
    const ROLE_AUTHOR = 'author';
    const ROLE_CUSTOMER = 'customer';

    public array $developerPermission = [];
    public array $superAdminPermission = [];

    /**
     * @return array
     */
    public array $defaultPermissions = [
        'blog.index' => 'blog permission description',
        'blog.show' => 'blog permission description',
        'user.show' => 'user permission description',
        'user.update' => 'user permission description',
        'user.delete' => 'user permission description',

        'product.index' => 'product permission description',
        'product.show' => 'product permission description',
    ];

    /**
     * @var array|string[]
     */
    public array $authorPermissions = [
        'withdraw.index' => 'withdraw permission description',
        'withdraw.view' => 'withdraw permission description',
        'withdraw.store' => 'withdraw permission description',
    ];

    /**
     * @var array|string[]
     */
    public array $adminPermission = [
        'permission.index' => 'permission permission description',
        'permission.view' => 'permission description',
        'permission.update' => 'permission description',

        'role.index' => 'role permission description',
        'role.view' => 'role description',
        'role.store' => 'role description',
        'role.update' => 'role description',
        'role.delete' => 'role description',
    ];

    /**
     * @param array $exclusives Exclude some permissions from the list
     * @return array
     */
    public static function permissions(array $exclusives = []): array
    {
        try {
            $class = new \ReflectionClass(__CLASS__);
            $constants = $class->getConstants();
            $permissions = Arr::where($constants, function ($value, $key) use ($exclusives) {
                return ! in_array($value, $exclusives) && Str::startsWith($key, 'PERMISSION_');
            });

            return array_values($permissions);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    /**
     * @return array
     */
    public static function menuPermissions(): array
    {
        try {
            $class = new \ReflectionClass(__CLASS__);
            $constants = $class->getConstants();
            $permissions = Arr::where($constants, function ($value, $key) {
                return Str::startsWith($key, 'PERMISSION_VIEW_MENU_');
            });

            return array_values($permissions);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    /**
     * @return array
     */
    public static function roles(): array
    {
        try {
            $class = new \ReflectionClass(__CLASS__);
            $constants = $class->getConstants();
            $roles = Arr::where($constants, function ($value, $key) {
                return Str::startsWith($key, 'ROLE_');
            });

            return array_values($roles);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }
}
