<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## RESTful API med Laravel

av Saga Einarsdotter Kikajon

## Om webbtjänsten

Den här webbtjänsten handlar om fiske, eftersom det skulle byggas ett REST API med CRUD-funktionalitet baserat på ens fritidsintresse. Det är byggt i Laravel.

## Endpoints

| Metod   | Sökväg        | Handling                      |
| ------- | ------------- | ----------------------------- |
| GET     |  api/         | Visar information om API:et   |
| GET     | api/fish      | Hämtar alla rader i databasen |
|  GET    |  api/fish/:id |  Hämtar rad baserat på id     |
| POST    |  api/fish     |  Lägger till rad i databasen  |
| PUT     |  api/fish/:id | Uppdaterar rad i databasen    |
|  DELETE |  api/fish/:id |  Raderar rad ur databasen     |

Till exempel leder ett GET-anrop till /api/fish/2 till

```
{
  "id": 2,
  "species": "Öring",
  "lengthInCm": 36,
  "weightInGrams": null,
  "released": false,
  "caughtWith": "Haspelspö, kopparspinnare",
  "created_at": "2024-12-02T17:49:43.000000Z",
  "updated_at": "2024-12-02T17:52:24.000000Z"
}
```

## Databas

Databasen är en PostgreSQL-databas på Render.com.  
Den har följande struktur:
| Nyckel | Datatyp | nullable |
| ------- |-------- |---------- |
| id - PK | bigint | not null |
| species | varchar(64) | not null |
| lengthInCm | double | nullable |
| weightInGrams | integer | nullable |
| released | boolean | not null |
| caughtWith | varchar(64) | not null |
| created_at | timestamp | nullable |
| updated_at | timestamp | nullable |

ID och timestamps genereras automatiskt.
