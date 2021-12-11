<?php
use OCA\URLDownloader\Services\Downloader;

echo "test";
echo $_SERVER['DOCUMENT_ROOT'];
echo __DIR__;
echo getcwd();

$d = new Downloader("url", "/home/josh/test.txt");

echo $d->run();