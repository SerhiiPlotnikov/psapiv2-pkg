<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

class ApiResponse
{
    private $response;

    private function __construct(array $response)
    {
        $this->response = $response;
    }

    public static function success($response): self
    {
        return new static([
            'data' => is_array($response) ? new \ArrayObject($response['items']) : $response,
            'meta' => is_array($response) ? new \ArrayObject($response['meta']) : ""
        ]);
    }

    public static function error(\stdClass $error): self
    {
        return new static([
            'error' => $error->messages[0]->message,
            'status_code' => $error->status_code,
            'context' => $error->messages[0]->context
        ]);
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}
