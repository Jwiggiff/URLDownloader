<?php
use OCA\URLDownloader\Services\Downloader;

echo "test";

$d = new Downloader();

echo $d->run("abc", "123");