# console
simple cosole app routing (в процессе написания)
Простое консольное приложение для запуска скиптовых команд и передачи им параметров
Паттерн выполнения команды php {скрипт запуска} {команда} -{действие} --{key=value} --{key2=value} 
Повторяющиеся ключи передаются массивом

Команды лежат по умолчанию в директории Command

Пример ипользования
php console.php help выполняет команду -- help и метод по умолчанию execute

php console.php test -help выполняет команду -- test и метод help

php console.php test -help --a=3 выполняет команду -- test и метод help и передавая в метод параметр $a



