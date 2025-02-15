<?php
declare(strict_types=1);

/**
 * MINZ - Copyright 2011 Marien Fressinaud
 * Sous licence AGPL3 <http://www.gnu.org/licenses/>
 */

class Minz_PdoSqlite extends Minz_Pdo {
	/**
	 * @param array<int,int|string|bool>|null $options
	 * @throws PDOException
	 */
	public function __construct(string $dsn, ?string $username = null, ?string $passwd = null, ?array $options = null) {
		parent::__construct($dsn, $username, $passwd, $options);
		$this->exec('PRAGMA foreign_keys = ON;');
	}

	#[\Override]
	public function dbType(): string {
		return 'sqlite';
	}

	/**
	 * @throws PDOException if the attribute `PDO::ATTR_ERRMODE` is set to `PDO::ERRMODE_EXCEPTION`
	 */
	#[\Override]
	public function lastInsertId(?string $name = null): string|false {
		return parent::lastInsertId();	//We discard the name, only used by PostgreSQL
	}
}
