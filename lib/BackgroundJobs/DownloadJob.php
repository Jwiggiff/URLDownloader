<?php
namespace OCA\URLDownloader\BackgroundJobs;

use \OCP\BackgroundJob\QueuedJob;
use \OCA\URLDownloader\Services\DownloadService;

class DownloadJob extends QueuedJob {
    private $dlService;

    public function __construct(ITimeFactory $time) {
        parent::__construct($time);
        $this->dlService = new DownloadService();
    }

    protected function run($argument) {
        $this->dlService->run($argument['url'], $argument['path']);
    }
}