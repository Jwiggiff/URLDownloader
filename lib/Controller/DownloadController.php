<?php
namespace OCA\URLDownloader\Controller;

use OCA\URLDownloader\BackgroundJobs\DownloadJob;
use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;
use OCP\BackgroundJob\IJobList;

class DownloadController extends Controller {
	private $jobList;

	public function __construct($AppName, IRequest $request, IJobList $jobList){
		parent::__construct($AppName, $request);
		$this->jobList = $jobList;
	}

	public function getJobs() {
    return new DataResponse($this->jobList);
	}

  /**
   * 
   * @NoCSRFRequired
   */
  public function addJob(string $url, string $path) {
    $this->jobList->add(new DownloadJob(), ['url' => $url, 'path' => $path]);

    return $this->getJobs();
  }
}
