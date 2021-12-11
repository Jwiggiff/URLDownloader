<?php
namespace OCA\URLDownloader\Services;

class Downloader {
  private $fp;
  private $url;
  private $path;

  public function __construct(string $url, string $path){
    $this->url = $url;
    $this->path = $path;
    // if(!file_exists($this->path)) {
    $this->fp = fopen($this->path, "w");
    // }
	}

  public function run() {
    // ob_start();

    echo "<pre>";
    echo "Loading ... \n";

    // ob_flush();
    // flush();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://stackoverflow.com/robots.txt");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_FILE, $this->fp);
    curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, array($this, 'progress'));
    // curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'writeFile');
    curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work

    curl_exec($ch);

    curl_close($ch);
    fclose($this->fp);

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