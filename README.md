
# Guest service API

Запуск контейнера
```bash
docker-compose up -d --build
```

Запуск миграций базы данных
```bash
docker-compose exec laravelapp php artisan migrate
```

Гости имеют следующие атрибуты:
- **идентификатор** (id)
- **имя** (first_name)
- **фамилия** (last_name)
- **email** (email)
- **телефон** (phone)
- **страна** (country)

При введении неверных данных происходит перенаправление на стартовую страницу

## Описание эндпоинтов

|**Метод**| **URL**        | **Описание**                                  |
|---------|----------------|-----------------------------------------------|
| GET     | `/guests`      | Получает список всех гостей.                  |
| GET     | `/guests/{id}` | Получает информацию о конкретном госте.       |
| POST    | `/guests`      | Создает нового гостя с указанными атрибутами. |
| PUT     | `/guests/{id}` | Обновляет информацию о конкретном госте.      |
| DELETE  | `/guests/{id}` | Удаляет информацию о конкретном госте.        |

 

### **Примеры запросов**  

```bash
curl -X GET https://localhost:8000/api/guests 
```                                                                                                                                                                                                       
```bash
curl -X GET https://localhost:8000/api/guests/1 
```                                                                                                                                                                                                     
```bash
curl -X POST https://localhost:8000/api/guests \  -H "Content-Type: application/json" \  -d '{   "first_name": "John",   "last_name": "Doe",   "email": "john@example.com",   "phone": "+1234567890",   "country": "USA" }' 
```                         
```bash
curl -X PUT https://localhost:8000/api/guests/1 \  -H "Content-Type: application/json" \  -d '{   "first_name": "John Updated",   "last_name": "Doe Updated",   "email": "john.updated@example.com",   "phone": "+1234567890",   "country": "USA" }' 
```
```bash
curl -X DELETE https://localhost:8000/api/guests/1 
```
