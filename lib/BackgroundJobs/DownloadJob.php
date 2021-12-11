<?php
namespace OCA\URLDownloader\BackgroundJobs;

// use \OCP\AppFramework\Utility\ITimeFactory;
use \OCP\AppFramework\Utility\TimeFactory;
use \OCP\BackgroundJob\QueuedJob;
use \OCA\URLDownloader\Services\DownloadService;

class DownloadJob extends QueuedJob {
    private $dlService;

    public function __construct() {
        parent::__construct(new TimeFactory());
        $this->dlService = new DownloadService();
    }

    protected function run($argument) {
        $this->dlService->run($argument['url'], $argument['path']);
    }
}