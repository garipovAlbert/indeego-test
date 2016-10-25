УСТАНОВКА
------------

###Код
* Установите необходимые пакеты
~~~
php composer.phar install
~~~
* Сгенерируйте локальные файлы (как в Advanced Application Template)
~~~
php init
~~~


###База данных
* Создайте базу в MySQL с кодировкой UTF-8 по умолчанию. 
* Отредактируйте файлы config/web-local и config/console-local, добавив туда ваши настройки подключения к MySQL
* Выполните миграцию
~~~
php yii migrate
~~~
