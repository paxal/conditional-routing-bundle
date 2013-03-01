<?php

namespace Example\ConditionalRoutingBundle\Routing;

use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;

class Loader implements LoaderInterface
{
  private $loaded = false;
  private $ymlLoader = null;
  private $hasFeature1 = false;
  private $hasFeature2 = false;

  /**
   * Constructor. Gets YAML route loader. Could get another route loader.
   * See configuration in services.xml
   * @param YamlFileLoader $ymlLoader
   * @param boolean $hasFeature1
   * @param boolean $hasFeature2
   */
  public function __construct(YamlFileLoader $ymlLoader, $hasFeature1, $hasFeature2)
  {
    $this->ymlLoader = $ymlLoader;
    $this->hasFeature1 = $hasFeature1;
    $this->hasFeature2 = $hasFeature2;
  }

  /**
   * (non-PHPdoc)
   * @see \Symfony\Component\Config\Loader\LoaderInterface::load()
   */
  public function load($resource, $type = null)
  {
    // Security
    if (true === $this->loaded)
    {
      throw new \RuntimeException('Interface loaded twice');
    }

    $loader = $this->ymlLoader;
    $routes = new RouteCollection();

    // Check feature, and conditionnaly load routing yml configuration
    if ($this->hasFeature1)
      $routes->addCollection($routes = $loader->import(__DIR__.'/../Resources/config/routing1.yml'));

    if ($this->hasFeature2)
      $routes->addCollection($routes = $loader->import(__DIR__.'/../Resources/config/routing2.yml'));

    // Return newly created routes
    return $routes;
  }

  public function supports($resource, $type = null)
  {
    return 'extra' === $type;
  }

  public function getResolver()
  {
  }

  public function setResolver(LoaderResolverInterface $resolver)
  {
    // irrelevant to us, since we don't need a resolver
  }
}
