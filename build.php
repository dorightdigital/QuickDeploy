<?php
$srcRoot = dirname(__FILE__)."/src";
$buildRoot = dirname(__FILE__)."/build";
$buildVersion = count($argv) > 1 ? $argv[1] : 'snapshot';
$fileName = 'quickdeploy-' . $buildVersion . '.phar';

if (!is_dir($buildRoot)) {
    mkdir($buildRoot);
}

$phar = new Phar($buildRoot . '/' . $fileName,
    FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, $fileName);
$phar['index.php'] = file_get_contents($srcRoot.'/index.php');
$phar->setStub($phar->createDefaultStub('index.php'));
