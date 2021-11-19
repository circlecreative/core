<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @modified    4/9/21, 12:55 AM
 * @author         Nur Wachid
 * @copyright      Copyright (c) 2021.
 */

namespace Neo\Core\Repositories;

use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;

class BaseManager
{
    /**
     * @param $resource
     * @param array $includes
     * @return array
     */
    public function buildData($resource, array $includes = []) : array
    {
        $manager = new Manager;
        $manager->setSerializer(new JsonApiSerializer(config('app.url')));
        $manager->parseIncludes($includes);

        return $manager->createData($resource)->toArray();
    }
}
