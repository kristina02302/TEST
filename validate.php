<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["phoneNumber"])) {
    $phoneNumber = $_POST["phoneNumber"];

    // Определяем коды стран, с которых может начинаться номер телефона
    $countryCodes = array('+373', '+7', '+48', '+380', '+44', '+40');

    // Проверяем, начинается ли номер телефона с одного из кодов стран
    $startsWithCountryCode = false;
    foreach ($countryCodes as $code) {
        if (strpos($phoneNumber, $code) === 0) {
            $startsWithCountryCode = true;
            // Можно также вывести страну, если это необходимо
            echo 'Страна: ' . getCountryName($code);
            break;
        }
    }

    // Если номер не начинается с известного кода страны
    if (!$startsWithCountryCode) {
        echo 'Неизвестная страна';
    }
} else {
    echo 'Неверный запрос. Убедитесь, что вы предоставляете действительный номер телефона.';
}

// Функция для получения названия страны по коду
function getCountryName($countryCode) {
    switch ($countryCode) {
        case '373':
            return 'Молдова';
        case '7':
            return 'Россия';
        case '48':
            return 'Польша';
        case '380':
            return 'Украина';
            case '44':
                return 'Великобритания';
                case '40':
                return 'Румыния';
        default:
            return 'Неизвестная страна';
    }
}
?>
