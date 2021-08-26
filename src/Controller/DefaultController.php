<?php

namespace Mailery\Setting\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Yiisoft\Yii\View\ViewRenderer;
use Psr\Http\Message\ResponseFactoryInterface as ResponseFactory;
use Mailery\Setting\Model\SettingGroupList;

class DefaultController
{
    /**
     * @var ViewRenderer
     */
    private ViewRenderer $viewRenderer;

    /**
     * @var ResponseFactory
     */
    private ResponseFactory $responseFactory;

    /**
     * @param ViewRenderer $viewRenderer
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ViewRenderer $viewRenderer, ResponseFactory $responseFactory)
    {
        $this->viewRenderer = $viewRenderer
            ->withController($this)
            ->withViewPath(dirname(dirname(__DIR__)) . '/views');

        $this->responseFactory = $responseFactory;
    }

    /**
     * @param Request $request
     * @param SettingGroupList $groupList
     * @return Response
     */
    public function index(SettingGroupList $groupList): Response
    {
        return $this->viewRenderer->render('index', compact('groupList'));
    }
}
