<?php
/**
 * App
 */

class App
{
    /** @var array 路由 */
    protected $routes = [];
    /** @var string 回應狀態碼 */
    protected $responseStatus = '200 OK';
    /** @var string 回應內容型態 */
    protected $responseContentType = 'text/html';
    /** @var string 回應主體 */
    protected $responseBody = 'Hello world';

    /**
     * 增加路由
     *
     * @param string $routePath 路由路徑
     * @param Closure $routeCallback 回調函式
     */
    public function addRoute($routePath, $routeCallback)
    {
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    /**
     * 發送
     *
     * @param string $currentPath 當前路徑
     */
    public function dispatch($currentPath)
    {
        foreach ($this->routes as $routePath => $callback) {
            if ($routePath === $currentPath) {
                $callback();
            }
        }

        header('HTTP/1.1 ' . $this->responseStatus);
        header('Content-type: ' . $this->responseContentType);
        header('Content-length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}

/** @var App $app app物件 */
$app = new App();
$app->addRoute('/users/josh', function () {
    $this->responseContentType = 'application/json;charset=utf8';
    $this->responseBody = '{"name": "Josh"}';
});
$app->dispatch('/users/josh');
