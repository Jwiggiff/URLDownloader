<?php
namespace OCA\URLDownloader\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {
	private $userId;

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		return new TemplateResponse('urldownloader', 'index');  // templates/index.php
	}

	/**
	 * Download file from $url to $path
	 * 
	 * @NoCSRFRequired
	 * 
	 * @param string $url
	 * @param string $path
	 */
	public function download(string $url, string $path) {
		// return new DataResponse("Nice Cock!\n" . $url . "\n" . $path);
		return new TemplateResponse('urldownloader', 'download');
	}

}
