<?php
use OCA\URLDownloader\Services\Downloader;

echo "test\n";

echo $_SERVER['DOCUMENT_ROOT']."\n";

echo __DIR__."\n";

echo getcwd()."\n";

$d = new Downloader("url", "/home/josh/test.txt");

echo $d->run();