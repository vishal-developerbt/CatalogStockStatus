<?php

namespace Bluethinkinc\CatalogStockStatus\Helper;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Io\File;

class Image extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $filesystem;
    protected $ioFile;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        Filesystem $filesystem,
        File $ioFile
    ) {
        parent::__construct($context);
        $this->filesystem = $filesystem;
        $this->ioFile = $ioFile;
    }

    public function moveFileFromTmp($fileName)
    {
        $mediaDirectory = $this->filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        $basePath = 'bt_catalogstockstatus/image';
        $tmpPath = 'bt_catalogstockstatus/tmp/image';

        $baseFile = rtrim($basePath, '/') . '/' . ltrim($fileName, '/');
        $tmpFile = rtrim($tmpPath, '/') . '/' . ltrim($fileName, '/');

        if ($mediaDirectory->isFile($tmpFile)) {
            $mediaDirectory->copyFile($tmpFile, $baseFile);
            $mediaDirectory->delete($tmpFile);
        }

        return $fileName;
    }

    public function getMediaUrl()
    {
        return $this->_urlBuilder->getBaseUrl(['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]);
    }

    public function getImageUrl($fileName)
    {
        return $this->getMediaUrl() . 'bt_catalogstockstatus/image/' . ltrim($fileName, '/');
    }
}
