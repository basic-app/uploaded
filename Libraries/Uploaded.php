<?php
/**
 * @author basic-app <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Uploaded\Libraries;

use Webmozart\Assert\Assert;
use BasicApp\Uploaded\Config\Uploaded as UploadedConfig;

class Uploaded extends \BasicApp\Storage\Libraries\BaseStorage
{

    public $configName = UploadedConfig::class;

    public function getBasePath() : string
    {
        return FCPATH;
    }

    public function url(?string $url) : string
    {
        $config = config($this->configName);

        Assert::notEmpty($config, 'Config not found: ' . $this->configName);

        $return = $config->basePath;

        if ($url)
        {
            $return .= '/' . $url;
        }

        return base_url($return);
    }

}