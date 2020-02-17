<?php
if(isset($_GET['year'])) {
	$year = $_GET['year'];
	if (filter_var($year, FILTER_VALIDATE_INT, array('options' => array('min_range' => 0))) !== false) {
		isLeapYear($year);
	} else {
		echo 'ОШИБКА ВО ВХОДНЫХ ДАННЫХ';
	}
	exit();
};

function isLeapYear($year) {
	if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
		echo 'ДА';
	} else {
		echo 'НЕТ';
	}
};
?>

<!DOCTYPE html>
<html>
<head>
	<title>Задание 1</title>
</head>
<body>
	<div id='wrapper'>
		<header>
			<h1>Узнать, является ли год високосным</h1>
		</header>
		<main>
			<form novalidate>
				<input type="number" name="year" placeholder="Введите год">
				<input type="submit" name="submit" value="Отправить">
			</form>
			<div id="output">
			</div>
		</main>
	</div>
</body>	
<style>
* {
	font-family: 'Arial', sans-serif;
}

#wrapper {
	max-width: 720px;
	width: 100%;
	margin: 0 auto;
	padding-top: 100px;
	text-align: center;
}

input {
	font-size: 20px;
	padding: 6px 10px;
	border: 1px solid #000;
} 

input[type='number'] {
	border-radius: 10px;
	border-bottom-right-radius: 0;
	border-top-right-radius: 0;
	margin-right: -7px;
}

input[type='submit'] {
	border-radius: 10px;
	border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}

input[type='submit']:hover {
	cursor: pointer;
}

#output {
	margin-top: 50px;
	font-size: 32px;
}

</style>
<script>
const form = document.querySelector('form');
form.onsubmit = function(event) {
	event.preventDefault();
	const inputVal = document.querySelector('[name="year"]').value;
	const request = new XMLHttpRequest();
	request.open('GET', document.location.href + '?year=' + inputVal, true);
	request.send();
	request.onload = function() {
		if (this.status == 200) {
			document.getElementById('output').textContent = this.responseText;
		};
	};
};
</script>
</html>
