<?php
namespace OCA\URLDownloader\Services;

class Downloader {
  private $fp;
  private $url;
  private $path;

  public function __construct(string $url, string $path){
    $this->url = $url;
    $this->path = $path;
		$this->fp = fopen($this->path, "w+");
	}

  public function run(string $url, string $path) {
    ob_start();

    echo "<pre>";
    echo "Loading ...";

    ob_flush();
    flush();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://stackoverflow.com");
    curl_setopt($ch, CURLOPT_FILE, $this->fp);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress');
    curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'writeFile');
    curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_exec($ch);
    curl_close($ch);
    fclose($this->fp);


    function writeFile($cp, $data) {
      $len = fwrite($this->fp, $data);
      return $len;
    }

    function progress($resource, $download_size, $downloaded, $upload_size, $uploaded)
    {
        if($download_size > 0)
            echo $downloaded / $download_size  * 100;
        ob_flush();
        flush();
        sleep(1); // just to see effect
    }

    echo "Done";
    ob_flush();
    flush();
  }
}