<?php

declare(strict_types=1);

namespace BlackBrickSoftware\MigrationBuilderSalesforce;

// use BadMethodCallException;
use LogicException;

abstract class Base
{

  /**
   * Magic getter for properties
   * 
   * @return mixed
   */
  public function __get(string $name)
  {
    if (!property_exists($this, $name))
      throw new LogicException("Unknown property: {$name}");

    return $this->$name;
  }

  /**
   * Magic isset check
   */
  public function __isset(string $name): bool
  {
    return property_exists($this, $name) && isset($this->$name);
  }

  // /**
  //  * Magic getter for properties via function call
  //  * 
  //  * @param string $name
  //  * @param array $arguements
  //  * @return mixed
  //  */
  // public function __call(string $name, array $arguements)
  // {
  //   if (strlen($name) > 3 && Str::substr($name, 0, 3) === 'get') {
  //     $propertyName = Str::substr($name, 3);
  //     $propertyName = Str::camel($propertyName);
  //     if (property_exists($this, $propertyName)) {
  //       return $this->$propertyName;
  //     }
  //   }

  //   throw new BadMethodCallException("Unknown method: {$name}");
  // }
}
