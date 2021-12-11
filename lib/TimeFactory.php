<?php
namespace OCA\URLDownloader;

use \OCP\AppFramework\Utility\ITimeFactory;

class TimeFactory implements ITimeFactory {
  public function getTime(): int {
    return time();
  }

  public function getDateTime(string $time = 'now', \DateTimeZone $timezone = null): \DateTime {
    return new \DateTime($time, $timezone);
  }
}