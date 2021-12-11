<?php
use OCA\URLDownloader\Services\Downloader;

echo "test <br>";

$d = new Downloader($_['url'], $_['path']);

echo $d->run();