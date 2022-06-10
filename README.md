## Тестовое задание Envybox

Сделать форму обратной связи.
При сохранении заявки использовать паттерн фабрика.
Реализовать структуру, чтобы можно было добавлять новые места для хранения заявок, например другая база данных или email.
Изначально реализовать сохранение в базу и в файл. Саму структуру базы можно не делать.

Поля: имя, телефон, само обращение. Валидация данных на бекенде.

Что необходимо использовать:
- PHP 7
  ООП (для создания заявки и места для хранения заявки)
- Фреймворк Laravel или mvc фреймворк
- DDD для организации приложения (не обязательно)
- Обязательно Vuejs

### Контроллеры

- App\Http\Api\ApplicationController - сохранение и получение заявок
- App\Http\AdminController - SSR-реализация
- App\Http\ExportController - экспорт данных в json и csv

### Классы

- App\Models\Application - модель заявки
- App\Models\Factories\SaverFactory - абстрактная фабрика
- App\Models\Factories\CsvSaverFactory - фабрика (сохранение в csv)
- App\Models\Factories\JsonSaverFactory - фабрика (сохранение в json)
- App\Models\Factories\DatabaseSaverFactory - фабрика (сохранение в бд)
- App\Models\Factories\MainSaverFactory - фабрика (сохранение на почту)
- App\Models\Savers\Saver - интерфейс сохранения
- App\Models\Savers\FileSaver - абстрактный класс сохранения в файл
- App\Models\Savers\CsvSaver - класс сохранения в csv
- App\Models\Savers\JsonSaver - класс сохранения в json
- App\Models\Savers\DatabaseSaver - класс сохранения в бд
- App\Models\Savers\MainSaver - класс сохранения на почту

### Запросы

- App\Http\Requests\ApplicationRequest - валидация

### Ресурсы

- App\Http\Resources\ApplicationResource - ресурс ответа

### Письма

- App\Mail\ApplicationMail - письмо с заявкой

### Тесты

- Tests\Feature\FactoryTest - проверка возвращаемых классов методом getSaver

### Vue-компоненты

- App - родительский компонент
- FormView - страница формы
- MessagesView - страница просмотра заявок
- MessagesItemComponent - компонент одной заявки из списка
- FormResultComponent - компонент предпросмотра отправленной заявки

### API-маршруты

- POST api/applications - сохранение заявки
- GET api/applications - просмотр заявок с пагинацией

### Web-маршруты

- / - главная
- /admin - просмотр заявок (SSR)
- /export-json - выгрузка json
- /export-csv - выгрузка csv

### Запуск Docker

- docker-compose build
- docker-compose up -d
- docker-compose exec app bash
- php artisan migrate
- php artisan db:seed (для заполнения 25 заявками)

### Где приложение?

- http://localhost:8080
