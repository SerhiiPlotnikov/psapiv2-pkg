<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\Exceptions\InvalidArgumentException;
use Psapiv2\Exceptions\InvalidRequestMethodException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class HttpClient implements ClientInterface
{
    private const API_QA_BASE_PATH = 'https://qa-psapiv2.geiger-api.com/api/v2';
    private const API_PROD_BASE_PATH = 'https://prod-psapiv2.geiger-api.com/api/v2';
    private const HTTP_METHODS = ['GET', 'POST', 'DELETE'];

    private $apiBasePath;
    protected $httpClient;
    private $currentHttpMethod;
    protected $postData;

    public function __construct(string $host, string $token)
    {
        $this->setApiBasePath($host);
        $this->httpClient = new Client([
            'base_uri' => $this->apiBasePath,
            'headers' => [
                'x-api-key' => $token
            ],
            'allow_redirects' => [
                'max' => 6,
                'strict' => true,
                'referer' => true,
                'protocols' => ['https']
            ]
        ]);
    }

    public function sendRequest(string $uri, string $query): \stdClass
    {
        $postData = $this->postData ?? '';
        $query = $query ?? '';

        try {
            $response = $this->httpClient->request($this->currentHttpMethod, $this->apiBasePath . $uri, [
                'query' => $query,
                'json' => $postData
            ]);
        } catch (ClientException $exception) {
            return json_decode((string)$exception->getResponse()->getBody());
        }

        return json_decode((string)$response->getBody());
    }

    public function setMethod(string $method): void
    {
        if (!in_array(strtoupper($method), self::HTTP_METHODS)) {
            throw new InvalidRequestMethodException("Method $method not found in available request methods: " . self::HTTP_METHODS);
        }
        $this->currentHttpMethod = $method;
    }

    public function setPostData(array $postData): void
    {
        $this->postData = $postData;
    }

    private function setApiBasePath(string $host): void
    {
        switch ($host) {
            case 'qa':
                $this->apiBasePath = self::API_QA_BASE_PATH;
                break;
            case 'prod':
                $this->apiBasePath = self::API_PROD_BASE_PATH;
                break;
            default:
                throw new InvalidArgumentException('Please set an environment (qa|prod).');
        }
    }
}
