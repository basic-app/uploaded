<?php

namespace BasicApp\Uploaded;

use Webmozart\Assert\Assert;
use BasicApp\Uploaded\Config\Uploaded as UploadedConfig;

trait UploadedTestTrait
{

    public function setUpUploaded() : void
    {
        $config = config(UploadedConfig::class);

        if ($config)
        {
            $config->basePath = 'test-uploaded';
        }
    }

    public function tearDownUploaded()
    {
        $config = config(UploadedConfig::class);

        if ($config)
        {
            helper(['file']);

            $result = delete_files(FCPATH . 'test-uploaded');

            Assert::true($result);
        }
    }

    public function uploadFile(string $source, string $name = null)
    {
        if (!$name)
        {
            $name = basename($source);
        }

        $config = config(UploadedConfig::class);

        $this->assertNotEmpty($config);

        $storage = service('uploaded');

        //print_r($storage);

        //die;

        $this->assertNotEmpty($storage);

        $result = $storage->writeFile($name, $source);

        //var_dump($name);
        //var_dump($source);
        //var_dump($result);

        //die;

        $filename = $storage->path($name);

        Assert::notEmpty($filename, 'Uploaded file not found: ' . $name);

        return [
            'name' => basename($filename),
            'type' => mime_content_type($filename),
            'tmp_name' => $filename,
            'error' => 0,
            'size' => filesize($filename)
        ];
    }

}