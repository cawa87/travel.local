<?php

namespace Application;

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'application' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[:controller][/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*/?',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*/?',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Index',
                                'action' => 'index'
                            ),
                        ),
                    ),
                ),
            ),
            'error' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/error[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*/?',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Error',
                        'action' => 'index',
                    ),
                ),
            )
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
        'alias' => array(
            'Zend\Authentication\AuthenticationService' => 'AuthService',
        ),
        'invokables' => array(
        // 'my_auth_service' => 'Zend\Authentication\AuthenticationService'
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Error' => 'Application\Controller\ErrorController',
            'Application\Controller\Test' => 'Application\Controller\TestController',
            'Application\Controller\News' => 'Application\Controller\NewsController',
            'Application\Controller\User' => 'Application\Controller\UserController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'helper_map' => array(
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'navigation' => [
        'default' => [
            'logo' => [
                'label' => 'Travel around',
                'route' => 'application',
               'class' => 'brand',
            ],
           
            'profile' => [
                'label' => 'Обьявления',
                'route' => 'application/default',
                'controller' => 'desk',
                'id' => 'desk',
            ],
            'reply' => [
                'label' => 'Ответы',
                'route' => 'application/default',
                'controller' => 'user',
                'action' => 'reply',
                'id' => 'reply'
            ],
            'news' => [
                'label' => 'Новости',
                'route' => 'application/default',
                'controller' => 'news',
                'id' => 'news'
            ],
            'user' => [
                'label' => 'Пользователи',
                'route' => 'application/default',
                'controller' => 'user',
                'id' => 'users'
            ],
            'userWidget' => [
                'label' => '',
                'route' => 'application/default',
                'class' => 'right',
                'pages' => [
                    'login' => [
                        'label' => 'Войти',
                        'route' => 'application',
                        'controller' => 'user',
                        'action' => 'login',
                        'id' => 'login'
                    ]
                ]
            ]
        ]
    ],
);
