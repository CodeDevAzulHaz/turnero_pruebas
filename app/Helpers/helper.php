<?php

	function redirect($page) {
		// header('location: ' . URLROOT . '/' . $page);
		header('location: ' . URLROOT . $page);
	}

	function notSession() {
		if (!isset($_SESSION['user'])) {
			return true;
		} else {
			return false;
		}
	}