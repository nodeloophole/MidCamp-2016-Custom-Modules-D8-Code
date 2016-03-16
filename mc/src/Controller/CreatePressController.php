<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\CreatePressController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\mc\CreatePressReleaseService;

/**
 * Class CreatePressController.
 *
 * @package Drupal\mc\Controller
 */
class CreatePressController extends ControllerBase {

  /**
   * Drupal\mc\CreatePressReleaseService definition.
   *
   * @var Drupal\mc\CreatePressReleaseService
   */
  protected $mc_create_pressrelease;
  /**
   * {@inheritdoc}
   */
  public function __construct(CreatePressReleaseService $mc_create_pressrelease) {
    $this->mc_create_pressrelease = $mc_create_pressrelease;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('mc.create.pressrelease')
    );
  }

  /**
   * Create.
   *
   * @return string
   *   Return Hello string.
   */
  public function createPressReleases($count) {
    $this->mc_create_pressrelease->generate($count);
    return [
        '#type' => 'markup',
        '#markup' => $this->t("$count Press Releases Generated.")
    ];
  }

}
