<?php

namespace emilymaitan\PAE_EM4\Model\Migration;

use emilymaitan\PAE_EM4\Core\AbstractDatabaseMigration;
use PDO;

class SampleMigration extends AbstractDatabaseMigration {

	/**
	 * @param PDO $pdo
	 */
	protected function execute(PDO $pdo) {
		$pdo->query(/** @lang MySQL */
			'
				CREATE TABLE sometable (
					id INT PRIMARY KEY AUTO_INCREMENT
				)
			'
		);
	}
}