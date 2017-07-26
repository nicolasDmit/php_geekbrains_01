<?php

$cityes = [];
$cityes['Московская область'] = ['Москва ', 'Подольск ', 'Клин'];
$cityes['Ленинградская область'] = ['Санкт-Петербург ', 'Всеволожск ', 'Павловск ', 'Кронштадт'];
$cityes['Рязанская область'] = ['Сасово ', 'Скопин ', 'Спас-Клепики'];

function echo_all_elements($array_cityes) {
	foreach ($array_cityes as $key => $value) {
		echo "$key:<br>";
		foreach ($value as $items) {
			$items = explode(" ", $items);
			$items = implode(",", $items);
			echo $items[0];
		}
		echo "<br>";
	}
}

echo_all_elements($cityes);
?>
