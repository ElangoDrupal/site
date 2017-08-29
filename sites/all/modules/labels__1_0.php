<?php
/**
 * Created by PhpStorm.
 * User: elango
 * Date: 8/27/17
 * Time: 10:27 AM
 */

/**
 * @file
 *
 * Contains \Drupal\restful_example\Plugin\resource\node\labels\label_1_0.php
 */

namespace Drupal\RESTfull_module\src\resource\entity\node\labels;
use Drupal\restful\Plugin\resource\ResourceNode;

/** @var ResourceNode / PHPUnit_Framework_MockObject_MockObject/  */
/**
 * Class labels__1_0
 * @package Drupal\restful\Plugin\resource
 *
 * @Resource(
 *   name = "labels:1.0",
 *   resource = "labels",
 *   label = "labels",
 *   description = "Export the labels with all authentication providers.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "node",
 *     "bundles": {
 *       "Basic_page"
 *     },
 *   },
 *   majorVersion = 1,
 *   minorVersion = 0
 * )
 */

class label_1_0 implements ResourceNode {

}