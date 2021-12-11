<?php
use OCA\URLDownloader\Services\Downloader;

echo "test";

$d = new Downloader("url", "/home/josh/test.txt");

echo $d->run();