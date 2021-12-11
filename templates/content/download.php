<?php
use OCA\URLDownloader\Services\Downloader;

echo "test <br>";

$d = new Downloader("url", "/media/plexmedia/test.txt");

echo $d->run();