<?php

class DateTimeView {


	public function show() {

		date_default_timezone_set('Europe/Stockholm');

		$time = date('H:i:s');
		$year = date('Y');
		$month = date('F');
		$dayNum = date('jS');
		$dayName = date('l');

		$timeString = "$dayName, the $dayNum of $month $year, The time is $time";

		return '<p>' . $timeString . '</p>';
	}
}