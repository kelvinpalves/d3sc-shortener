<?php

	class DescShortService {

		private $conn;

		public function __construct($connect) {
			$this->conn = $connect->getConn();
		}

		public function findData($data) {
			$sql = "SELECT * FROM d3sc_short WHERE short_url_code = ?";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute(array($data));
			return $stmt->fetchAll();
		}

		public function insert($descShort) {
			$sql = "INSERT INTO `d3sc_short` (short_owner_ip, short_url_code, short_url_base, short_hits) VALUES (?, ?, ?, '0')";

			$stmt = $this->conn->prepare($sql);
			return $stmt->execute(array($descShort->getShortOwnerIp(), $descShort->getShortUrlCode(), $descShort->getShortUrlBase()));
		}

		public function update($request) {
			$sql = "UPDATE `d3sc_short` SET short_hits = short_hits + 1 WHERE short_url_code = ?";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute(array($data));
		}

	}