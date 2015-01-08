<?php

require_once BASE_PATH . '/vendor/autoload.php';

use Aws\Common\Aws;

/**
 * @author elliot@silverstripe.com
 * @license BSD License http://silverstripe.org/bsd-license/
 */
class AmazonQueueHandler {

	public $amazonService;

	/**
	 * Initialize the Amazon Simple Queuing service from credentials 
	 * loaded into your environment
	 *
	 * For this class to work, you need to have a set of Amazon credentials and
	 * a region defined in _ss_environment.php. Define the following constants:
	 * - AWS_ACCESS_KEY
	 * - AWS_ACCESS_SECRET
	 * - AWS_REGION_NAME 
	 */
	public function __construct() {
		if(class_exists('Aws\Common\Aws')) {
			$this->amazonService = Aws::factory(array(
				'key'    => AWS_ACCESS_KEY,
				'secret' => AWS_ACCESS_SECRET,
				'region' => AWS_REGION_NAME
			))->get('Sqs');

		}
	}

	// public function startJobOnQueue(QueuedJobDescriptor $job) {
	// 	$this->amazonService->jobqueueExecute($job->ID);
	// }
}
