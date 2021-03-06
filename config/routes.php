<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('api', function ($routes) {
    $routes->resources('Users');

    $statisticsMap = [
        'summary' => [
            'action' => 'summary',
            'method' => 'GET',
            'path' => '/summary'
        ],
        'details' => [
            'action' => 'details',
            'method' => 'GET',
            'path' => '/details'
        ]
    ];

    $routes->resources('Accounts', function ($routes) use ($statisticsMap) {
        $routes->resources('Campaigns', [
            'prefix' => 'accounts',
			'map' => [
                [
                    'action' => 'load',
                    'method' => 'GET',
                    'path' => '/load',
                ],
            ],
        ]);
    });

    $routes->resources('Projects', function ($routes) use ($statisticsMap) {
        $routes->resources('Sites', [
            'prefix' => 'projects',
            'only' => ['index']
        ]);
        $routes->resources('Accounts', [
            'prefix' => 'projects',
            'only' => ['index']
        ]);
        $routes->resources('Campaigns', [
            'prefix' => 'projects',
            'only' => ['index']
        ]);
        $routes->resources('Leads', [
            'prefix' => 'projects',
            'only' => ['index']
        ]);
        $routes->resources('Orders', [
            'prefix' => 'projects',
            'map' => [
                [
                    'action' => 'cost',
                    'method' => 'GET',
                    'path' => '/cost',
                ],
            ],
        ]);
        $routes->resources('Statistics', [
            'prefix' => 'projects',
            'map' => $statisticsMap,
        ]);
    });

    $routes->resources('Sites', function ($routes) use ($statisticsMap) {
        $routes->resources('Sources', [
            'prefix' => 'sites',
            'only' => ['index']
        ]);
        $routes->resources('Leads', [
            'prefix' => 'sites',
            'only' => ['index']
        ]);
        $routes->resources('Statistics', [
            'prefix' => 'sites',
            'only' => null,
            'map' => array_merge($statisticsMap, [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ]
            ]),
        ]);
        $routes->resources('Orders', [
            'prefix' => 'sites',
        ]);
        $routes->resources('Utm', [
            'prefix' => 'sites',
            'map' => [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ]
            ],
        ]);
    });

    $routes->resources('Sources', function ($routes) use ($statisticsMap) {
        $routes->resources('Costs', [
            'prefix' => 'sources',
        ]);
        $routes->resources('Statistics', [
            'prefix' => 'sources',
            'map' => $statisticsMap,
        ]);
        $routes->resources('Campaigns', [
            'prefix' => 'sources',
            'only' => ['index']
        ]);
        /*$routes->resources('Leads', [
            'prefix' => 'sites',
            'only' => ['index']
        ]);
        $routes->resources('Statistics', [
            'prefix' => 'sites',
            'only' => null,
            'map' => array_merge($statisticsMap, [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ]
            ]),
        ]);
        $routes->resources('Orders', [
            'prefix' => 'sites',
        ]);
        $routes->resources('Costs', [
            'prefix' => 'sites',
        ]);
        $routes->resources('Utm', [
            'prefix' => 'sites',
            'map' => [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ]
            ],
        ]);*/
    });

    $routes->resources('Campaigns', function ($routes) use ($statisticsMap) {
        $routes->connect('/sync', ['controller' => 'campaigns', 'action' => 'sync']);
        $routes->connect('/keywords', ['controller' => 'campaigns', 'action' => 'keywords']);

        $routes->resources('Statistics', [
            'prefix' => 'campaigns',
            //'only' => false,
            'map' => array_merge($statisticsMap, [
                'loadCostFromXml' => [
                    'action' => 'loadCostFromXml',
                    'method' => 'GET',
                    'path' => '/load_cost_from_xml'
                ],
            ]),
        ]);
        $routes->resources('Bids', [
            'prefix' => 'campaigns',
            'map' => [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ], [
                    'action' => 'delete',
                    'method' => 'DELETE',
                    'path' => '/',
                ],
            ],
        ]);
        $routes->resources('AdGroups', [
            'prefix' => 'campaigns',
        ]);
    });

    $routes->resources('AdGroups', function ($routes) use ($statisticsMap) {
        $routes->connect('/keywords', ['controller' => 'ad-groups', 'action' => 'keywords']);
        $routes->resources('Bids', [
            'prefix' => 'ad_groups',
            'map' => [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ], [
                    'action' => 'delete',
                    'method' => 'DELETE',
                    'path' => '/',
                ],
            ],
        ]);
        $routes->resources('Statistics', [
            'prefix' => 'ad_groups',
            'map' => $statisticsMap,
        ]);
    });

    $routes->resources('Keywords', function ($routes) use ($statisticsMap) {
        $routes->resources('Bids', [
            'prefix' => 'keywords',
            'map' => [
                [
                    'action' => 'edit',
                    'method' => 'PUT',
                    'path' => '/',
                ], [
                    'action' => 'delete',
                    'method' => 'DELETE',
                    'path' => '/',
                ],
            ],
        ]);
        $routes->resources('Statistics', [
            'prefix' => 'keywords',
            'map' => $statisticsMap,
        ]);
    });

    $routes->resources('Bidder');

    $routes->fallbacks(InflectedRoute::class);
    //$routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
