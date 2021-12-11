<?php
use OCA\URLDownloader\Services\Downloader;

echo "test <br>";

echo __DIR__;

$d = new Downloader("url", __DIR__."/test.txt");

echo $d->run();