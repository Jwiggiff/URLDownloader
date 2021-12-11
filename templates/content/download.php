<?php
use OCA\URLDownloader\Services\Downloader;

echo "test <br>";

echo __DIR__;

$d = new Downloader("url", "/media/plexmedia/test.txt");

echo $d->run();

/**
 * I have permission at __DIR__, but not anywhere else
 * Maybe try downloading then moving?
 * Also for some reason can't call progress function
 */