<?php
/**
 * @author basic-app <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Uploaded\Config;

use Webmozart\Assert\Assert;

class Services extends \CodeIgniter\Config\BaseService
{

    public static function uploaded($getShared = true)
    {
        if ($getShared)
        {
            return static::getSharedInstance(__FUNCTION__);
        }

        $config = config(Uploaded::class);

        Assert::notEmpty($config, 'Config not found: ' . Uploaded::class);

        $path = FCPATH . $config->basePath;

        $adapter = new \League\Flysystem\Local\LocalFilesystemAdapter($path);
    
        return new \BasicApp\Uploaded\Libraries\Uploaded($adapter);
    }

}