<?php

/**
 * @file
 * Contains \Drupal\mc\Routing\RouteSubscriber.
 */

namespace Drupal\mc\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouteSubscriber.
 *
 * @package Drupal\mc\Routing
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {
  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    // Altering things about the user login page.
    if ($route = $collection->get('user.login')) {
      // Change the path for the user login page.
      $route->setPath('/login');
      // Change the title of the page for user login page.
      $route->setDefault('_title', 'Let Me In!');
    }

    // Altering things about the Appearance page.
    if ($route = $collection->get('system.themes_page')) {
      // Change the title for the Appearance page.
      $route->setDefault('_title', 'The Look');
      $route->setPath('/admin/gary');
    }
  }
}
