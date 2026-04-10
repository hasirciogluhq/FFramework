<?php

namespace FFramework\Error;

use FFramework\Http\Request;
use Throwable;

class Handler
{
    public static function handleNotFound(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Not Found');
        echo json_encode(['error' => 'Not Found', 'path' => $request->getUri()]);
    }

    public static function handleExceptions(array $params, Request $request, int $code, Throwable $exception): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Internal Server Error');
        echo json_encode([
            'error'   => 'Internal Server Error',
            'message' => $exception->getMessage(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
        ]);
    }

    public static function handleMethodNotAllowed(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Method Not Allowed');
        echo json_encode(['error' => 'Method Not Allowed', 'path' => $request->getUri()]);
    }

    public static function handleForbidden(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Forbidden');
        echo json_encode(['error' => 'Forbidden', 'path' => $request->getUri()]);
    }

    public static function handleUnauthorized(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Unauthorized');
        echo json_encode(['error' => 'Unauthorized', 'path' => $request->getUri()]);
    }

    public static function handleBadRequest(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Bad Request');
        echo json_encode(['error' => 'Bad Request', 'path' => $request->getUri()]);
    }

    public static function handleNotAcceptable(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Not Acceptable');
        echo json_encode(['error' => 'Not Acceptable', 'path' => $request->getUri()]);
    }

    public static function handleProxyAuthenticationRequired(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Proxy Authentication Required');
        echo json_encode(['error' => 'Proxy Authentication Required', 'path' => $request->getUri()]);
    }

    public static function handleRequestTimeout(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Request Timeout');
        echo json_encode(['error' => 'Request Timeout', 'path' => $request->getUri()]);
    }

    public static function handleConflict(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Conflict');
        echo json_encode(['error' => 'Conflict', 'path' => $request->getUri()]);
    }

    public static function handleGone(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Gone');
        echo json_encode(['error' => 'Gone', 'path' => $request->getUri()]);
    }

    public static function handleLengthRequired(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Length Required');
        echo json_encode(['error' => 'Length Required', 'path' => $request->getUri()]);
    }

    public static function handlePreconditionFailed(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Precondition Failed');
        echo json_encode(['error' => 'Precondition Failed', 'path' => $request->getUri()]);
    }

    public static function handleRequestEntityTooLarge(array $params, Request $request, int $code): void
    {
        http_response_code($code);
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' Request Entity Too Large');
        echo json_encode(['error' => 'Request Entity Too Large', 'path' => $request->getUri()]);
    }

    public static function handleErrors(int $errorNumber, string $errorMessage, string $errorFile, int $errorLine): void
    {
        http_response_code(500);
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Error');
        echo json_encode(['error' => 'Error', 'message' => $errorMessage, 'file' => $errorFile, 'line' => $errorLine, 'errorNumber' => $errorNumber]);
    }
}
