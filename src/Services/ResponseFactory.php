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

use League\Flysystem\FilesystemInterface;
use League\Glide\Responses\ResponseFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use League\Flysystem\FilesystemOperator;

class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * Request object to check "is not modified".
     * @var Request|null
     */
    protected $request;

    /**
     * Create SymfonyResponseFactory instance.
     * @param Request|null $request Request object to check "is not modified".
     */
    public function __construct(Request $request = null)
    {
        $this->request = $request;
    }

    /**
     * Create the response.
     * @param FilesystemInterface $cache The cache file system.
     * @param string $path The cached file path.
     * @return StreamedResponse    The response object.
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function create(FilesystemOperator $cache, $path)
    {
        $stream = $cache->readStream($path);

        $response = new StreamedResponse();
        $response->headers->set('Content-Type', $cache->getMimetype($path));
        $response->headers->set('Content-Length', $cache->getSize($path));
        $response->setPublic();
        $response->setMaxAge(31536000);
        $response->setExpires(date_create()->modify('+1 years'));

        if ($this->request) {
            $response->setLastModified(date_create()->setTimestamp($cache->getTimestamp($path)));
            $response->isNotModified($this->request);
        }

        $response->setCallback(function () use ($stream) {
            if (ftell($stream) !== 0) {
                rewind($stream);
            }
            fpassthru($stream);
            fclose($stream);
        });

        return $response;
    }
}
