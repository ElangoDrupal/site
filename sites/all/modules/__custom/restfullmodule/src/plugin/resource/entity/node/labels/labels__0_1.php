<?php
/**
 * Created by PhpStorm.
 * User: elango
 * Date: 8/26/17
 * Time: 5:42 PM
 */

namespace Drupal\restfullmodule\plugin\resource\entity\node\labels;

use Drupal\restful\Plugin\resource\ResourceNode;

/**
 * Class labels__0_1
 * @package Drupal\RESTfull_module\plugin\resources\entity\node\labels
 *
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
 *       "article"
 *     },
 *   },
 *   majorVersion = 1,
 *   minorVersion = 0
 * )
 *
 *
 *
 *
 *
 */

class labels__0_1  extends ResourceNode
{

}