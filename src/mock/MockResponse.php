<?php
namespace Typeform\mock;

use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class MockResponse
{
    const RESOURCE_BASE     = 'base';
    const RESOURCE_FORM     = 'forms';
    const RESOURCE_IMAGE    = 'images';
    const RESOURCE_DESIGN   = 'designs';
    const RESOURCE_URL      = 'urls';

    /**
     * @return array valid resource types
     */
    public static function getResourceTypes()
    {
        return [self::RESOURCE_BASE, self::RESOURCE_FORM, self::RESOURCE_IMAGE,
            self::RESOURCE_DESIGN, self::RESOURCE_URL,
        ];
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public static function getResponse(Request $request)
    {
        try {
            $mockData = self::findMock($request);
            if ($mockData) {
                $status = isset($mockData['status']) ? $mockData['status'] : 200;
                $headers = isset($mockData['headers']) ? $mockData['headers'] : [];
                $bodyContent = isset($mockData['body']) ? $mockData['body'] : '';
                $bodyStream = Stream::factory($bodyContent);

                return new Response($status, $headers, $bodyStream);
            }
        } catch (\Exception $e) {
            /*
             * If error occurs like invalid resource type, return bad request 400 error with custom header
             * X-Error with error message from exception
             */
            return new Response(400, ['X-Error' => $e->getMessage()], Stream::factory(''));
        }

        /*
         * Default response if mock not found, return 404
         */
        return new Response(404, [], Stream::factory(''));
    }


    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public static function findMock(Request $request)
    {
        $method = strtoupper($request->getMethod());
        $type  = self::getResourceTypeFromUrl($request->getUrl());
        if ( ! in_array($type, self::getResourceTypes())) {
            $type = self::RESOURCE_BASE;
        }

        $path = self::getPath($request->getUrl());
        $mockKey = $method . ' ' . $path;

        $mockData = include __DIR__ . '/' . $type . '.php';
        if (isset($mockData[$mockKey])) {
            return $mockData[$mockKey];
        } else {
            throw new \Exception(
                'Mock not found in ' . $type . '.php for request: ' . htmlentities($mockKey),
                1462914673
            );
        }
    }

    /**
     * Parse resource type out of url
     * @param string $url
     * @return string
     * @throws \Exception
     */
    public static function getResourceTypeFromUrl($url)
    {
        $matchFound = preg_match('/(\w+)[\/?]?/', $url, $matches);
        if( ! $matchFound || ! is_array($matches) || ! isset($matches[1])) {
            return self::RESOURCE_BASE;
        }

        return $matches[1];
    }

    /**
     * Parse request path out of url
     * @param string $url
     * @return string
     * @throws \Exception
     */
    public static function getPath($url)
    {
        $matchFound = preg_match('/(.*$)/', $url, $matches);
        if( ! $matchFound || ! is_array($matches) || ! isset($matches[1])) {
            throw new \Exception('Unable to parse url path', 1462733286);
        }

        return $matches[1];
    }

}