# console
simple cosole app routing (в процессе написания)  
Простое консольное приложение для запуска скиптовых команд и передачи им параметров  
Паттерн выполнения команды php {скрипт запуска} {команда} -{действие} --{key=value} --{key2=value}   
Повторяющиеся ключи передаются массивом  

Команды по умолчанию задаются в файле Routing (Изменить можно в конфиге):   
Название команды - Класс обработывающий эту команду   
$this->route->addRoute("test",\SeeNotEvil\Console\Command\Test::class) ;

Конфиг:    
return [
   'routing_path' => __DIR__.'RoutingConsole.php' // Добавляет путь до файла с роутами
] ;


Пример ипользования:  
php console.php help выполняет команду -- help и метод по умолчанию execute  
php console.php test -help выполняет команду -- test и метод help  
php console.php test -help --a=3 выполняет команду -- test и метод help и передавая в метод параметр $a  

Команда должна наследоваться от класса Command   
По умолчанию команда содержит метод execute, который выполняется если не передать в команду действие   
Пример:   
php console help - выполнится метод execute команды Help   
В команду в качестве аргументов передаются параметры   
(В дальнейшем планируется добавить реализацию контейнера зависимостей)   












