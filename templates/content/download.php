<?php
use OCA\URLDownloader\Services\Downloader;

$d = new DownloadService();

echo $d->run($_['url'], $_['path']);