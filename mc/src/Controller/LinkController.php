<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\LinkController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;


/**
 * Class LinkController.
 *
 * @package Drupal\mc\Controller
 */
class LinkController extends ControllerBase {
  /**
   * Generatelinks.
   *
   * @return string
   *   Return Hello string.
   */
  public function generateLinks() {
    // Start a content array for the markup in this controller.
    $content = [];

    // Heading for simple link
    $content[] = [
      '#type' => 'markup',
      '#markup' => "<h4>Simple Link fromUri</h4>"
    ];

    // Create a url from URI
    $url = Url::fromUri('http://www.google.com');
    // Set the link text
    $text = $this->t("Google");
    // Create the link using new Link().
    $link = new Link($text, $url);
    // Turn the link object toString and add to the content array
    $content[] = [
      '#type' => 'markup',
      '#markup' => $link->toString()
    ];

    // Create a link from Route
    $content[] = [
      '#type' => 'markup',
      '#markup' => "<h4>Simple Link fromRoute</h4>"
    ];

    // Create a url from route to Front page of the site
    $url = Url::fromRoute('<front>');
    // Set the link text
    $text = $this->t('Home Page');
    // Create the link from Text and URL. Turn into a string.
    $link =  Link::fromTextAndUrl($text, $url)->toString();
    // Add the link to the content array.
    $content[] = [
      '#type' => 'markup',
      '#markup' => $link,
    ];


    // Create a link from a Route with additional parameters on it.
    $content[] = [
      '#type' => 'markup',
      '#markup' => "<h4>Link with Complex Route (with query and fragment)</h4>"
    ];
    // Create link from Route. Pass array for query and fragment.
    // link will be absolute: "http://[site url]/?foo=1#jump_to"
    $link = Link::createFromRoute("Home Again", '<front>', [], [
      'query' => array('foo' => 1),
      'fragment' => 'jump_to',
      'absolute' => TRUE
    ])
      ->toString();
    $content[] = [
      '#type' => 'markup',
      '#markup' => $link,
    ];

    // Create a link from text and url. Turn into a render array, then add
    // class to make it appear as a button.
    $content[] = [
      '#type' => 'markup',
      '#markup' => "<h4>Link to Render Array and adding attributes (class)</h4>"
    ];
    // Creating a link from text and URL. forcing the link to HTTPS. Then turn
    // the link into a render array.
    $link = Link::fromTextAndUrl('Howdy', url::fromUri('http://www.yahoo.com', [
      'https' => TRUE
    ]))->toRenderable();

    // Adding class attributes to the render array
    $link['#attributes'] = [
      'class' => ['foo', 'button'],
    ];

    $content[] = $link;


    return $content;
  }

}
