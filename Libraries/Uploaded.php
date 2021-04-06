<?php
/**
 * @author basic-app <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Uploaded\Libraries;

use BasicApp\Uploaded\Config\Uploaded as UploadedConfig;

class Uploaded extends \BasicApp\Storage\Libraries\BaseStorage
{

    public $configName = UploadedConfig::class;

}