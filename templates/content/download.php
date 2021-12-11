<?php
use OCA\URLDownloader\Services\Downloader;

echo "test";

$d = new Downloader("url", "/test.txt");

echo $d->run();