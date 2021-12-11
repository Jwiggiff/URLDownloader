<?php
namespace OCA\URLDownloader\Services;

class DownloadService {
  // private $fp;

  public function __construct(){
    // if(!file_exists($this->path)) {
    // $this->fp = fopen($this->path, "w");
    // }
	}

  public function run(string $url, string $path) {
    $fp = fopen($path, "w");

    // ob_start();

    echo "<pre>";
    echo "Loading ... \n";

    // ob_flush();
    // flush();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, array($this, 'progress'));
    // curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'writeFile');
    curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work

    curl_exec($ch);

    curl_close($ch);
    fclose($fp);

    echo "Done";
    // ob_flush();
    // flush();
  }

  public function progress($resource, $download_size, $downloaded, $upload_size, $uploaded) {
    if($download_size > 0)
        echo "<progress value=" . $downloaded/$download_size * 100 . " max=\"100\"></progress>";
        // echo $downloaded / $download_size  * 100;
    else
      echo "<progress value=" . $downloaded . " max=\"100\"></progress>";
    // ob_flush();
    // flush();
    // sleep(1); // just to see effect
  }
}