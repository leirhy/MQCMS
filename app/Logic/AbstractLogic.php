<?php
declare(strict_types=1);

namespace App\Logic;

use App\Middleware\BaseAuthMiddleware;
use Hyperf\HttpServer\Contract\RequestInterface;

abstract class AbstractLogic
{
    /**
     * @var
     */
    public $service;

    /**
     * @param RequestInterface $request
     * @return array
     */
    abstract public function index(RequestInterface $request): array;

    /**
     * @param RequestInterface $request
     * @return array
     */
    abstract public function show(RequestInterface $request): array;

    /**
     * @param RequestInterface $request
     * @return int
     */
    abstract public function store(RequestInterface $request): int;

    /**
     * @param RequestInterface $request
     * @return int
     */
    abstract public function delete(RequestInterface $request): int;

    /**
     * @param RequestInterface $request
     * @return int
     */
    abstract public function update(RequestInterface $request): int;

    /**
     * 获取token值
     * @return string
     */
    public function getAuthToken(): string
    {
        return BaseAuthMiddleware::$authToken;
    }

    /**
     * 获取解析后的token数据
     * @return array
     */
    public function getTokenInfo(): array
    {
        return BaseAuthMiddleware::$tokenInfo;
    }

    /**
     * 创建token
     * @param $info
     * @return string
     */
    public function createAuthToken($info, RequestInterface $request): string
    {
        return BaseAuthMiddleware::createAuthToken($info, $request); // TODO: Change the autogenerated stub
    }

    /**
     * @return array
     */
    public function getJwtConfig(RequestInterface $request): array
    {
        return BaseAuthMiddleware::getJwtConfig($request);
    }
}