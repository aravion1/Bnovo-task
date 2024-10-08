```
cp .env.example .env
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan migrate
```

Список эндпоинтов:
* GET: /guests - список гостей 

Запрос:
```
curl --location 'http://localhost:8000/guests' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6IkxYVlhIanBNZThPTk1zNHpwck43L0E9PSIsInZhbHVlIjoidDRicXFMUUVkN0hEZmtKMENzTENQZjh5LytJbUhSeEVRT1hvOWFCdzhPZWFINklQWjkvUWdGcXV2a1VOcmF0cHhZUE1jRmVOWElOd3RBdzRUZXVJT2U1TFlpSHpXVjhSTTZhZUlPblYzSytnNjZnWEppZkxDY09ROE93Q0lNYmIiLCJtYWMiOiIxZTU4N2IxNjFmOWNiNjRkMGJjZDU2MzcyZTQxOWQ5YTZkYjZhMzE4MWJkYjczZTQxYWFhYTQ0MTYxYzgzODQ3IiwidGFnIjoiIn0%3D; bnovo_session=eyJpdiI6ImcydmpBa3BjZjBzSGs5eWpyem5qbXc9PSIsInZhbHVlIjoiKytwdVpMT2ZUR1dDV1R4NURwblcyUnNrc05idnpKNUlteFNyakc3bUJhZ2ViZVU0bG81ZmJGWllQV3FndjJ4bzBSNVgzOW1KandmLzFXa0t2Sjl6cGdoN1ZNTTIvRHBuelVkdTJWQXhpU1JSa0lEQndaTGYxSFNTV0l5VExZaW4iLCJtYWMiOiJlNGQwNWM2N2M4NTRhMWZmY2U3ZTYzODU5NjllY2NlMTYyMDBmNWE2MjJiMTMwMTU5ZDIwODViYTdmMGRhOWI5IiwidGFnIjoiIn0%3D'
```


Ответ:
```
[
    {
        "id": 2,
        "name": "Владислав",
        "sername": "Фомин",
        "email": "aravion1@gmail.com",
        "phone": "8(999)464-53-96",
        "country": "Англия"
    }
]
```


* POST: /guests/create - Добавление гостя


Запрос:
```
curl --location 'http://localhost:8000/guests/create' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6Ind3L2RVZEhOWnJmaG0xWTEvdDk4ZVE9PSIsInZhbHVlIjoiVGpCZndPOXF3Y3NSZGphOGtsU1NVcmRtSlRjbE1LWEFrdENMVDhQelhJNThmc1V6OVA2MForT1YycjRDMjUwdmZBZ3BGNW01WEEyQVkyR0NaWnlhQWdRL2R6N0lZY2Yzbmd4alMwTkJkM3pMdnVHTWhvdmdJeDB0UmtNa2FCNXciLCJtYWMiOiJhYjM5YWRkZjQ4Y2FkNDRlNzE0MmYwZTllZTY5ODZiZTE3OWNlYzRiODNlOThiOTRiMjI4NDQ4ODc0MTk0Y2I0IiwidGFnIjoiIn0%3D; bnovo_session=eyJpdiI6IlJ0N3ZWOUJ5Yk96L1IrQVZZWFR2cXc9PSIsInZhbHVlIjoiaHlubXNwMkVybTZTSGhFZHRmSHdJVkd4WFhkMTR5Yjh3RXdHTlQzUGNMeEpSYll0QThLbDhobFNKTGVXZGlibkx6OEF0THBvQzdqa2NtWGxva2lGVklTVVFhbEliUFBSQ1l0bGsrYVcyL0pSOURBWTZxazRKNlZ1bjlSVGVFaHMiLCJtYWMiOiJhZDBhOGVlZmRmZjUxODc1YmRhMjU1N2U4NGJjYmYyNTBiMTY2YzE2ZDMxYTY5NWVmODEzYmVmY2M3MTY4NmZhIiwidGFnIjoiIn0%3D' \
--form 'email="aravion1@gmail.com"' \
--form 'name="Владислав"' \
--form 'sername="Фомин"' \
--form 'phone="+79994645396"' \
--form 'country="Англия"'
```

Ответ:

```
{
    "name": "Владислав",
    "email": "aravio1n1@gmail.com",
    "sername": "Фомин",
    "phone": "8(999)464-53-93",
    "country": "Англия",
    "id": 3
}
```

* PATCH: /guests/{id} - обновление гостя

Запрос:
```
curl --location --request PATCH 'http://localhost:8000/guests/2' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6Im5sVlJDODdnRUhlbEIvQnZBSnFxUXc9PSIsInZhbHVlIjoia01XNVQyRFlJVzFOVGY4VmZIWEVaRmF3QlJMdkUxSmZMQUFTWnNrY1gweFd2a3h5WFQ0UHQwbGVjKzFIUzdHUi90Y25wTWhsR1RtbkhCTW9XQmp0RzRUK2o5cklBdDU3OC9pNzRCcWNjVGJaREM2c0VranNqT2Z2dU4rNlgxQWMiLCJtYWMiOiJhMjE4Mjc2MzQ4ODVmYTYwMTE2ZWEyNzQ0NzZmNGNmMzk2OWUyOGM4YTY1Zjk2NmU3MjE2YTlmMzYwZmI0ZmIxIiwidGFnIjoiIn0%3D; bnovo_session=eyJpdiI6IlNLT0JhUEdaNUlsMlNqZkU5Tzhtd3c9PSIsInZhbHVlIjoiRWIwWmdvdzBzRmMxeTA5MERsdUEvOHR0ZXlqV3RIZ0dMZ1orSXBuczZUSFdTMHFPeGdXbmJXZ0tqbkdkb3dBZ0laQ2hDaWM3RjNINjJ6c2sxM3lTaEJ3a0p0Ylg2ZHJtUDdmUTdVVzlidzRiZUdpR0YzY2tVcS92dGo1OWJFaHgiLCJtYWMiOiI5NTNiMDQ0ZTAzNmIwZjcwN2Y5NGYxODkxZTg4MjEwODFmNGNlMjA5ZjBhYmZhNjVhZDMxMjA2OTdlMjg0NmJjIiwidGFnIjoiIn0%3D' \
--data '{
    "name": "Григорийq"
}'
```

Ответ:
```
{
    "result": 0
}
```



* DELETE: /guests/{id} - удаление гостя

Запрос:
```
curl --location --request DELETE 'http://localhost:8000/guests/1' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6Im43T25pUHNVcGxNd1g2dGRtRHViL1E9PSIsInZhbHVlIjoiZHhQMUxiRFNZVUJ5dDhNejQ0UTJxUm0xaWh0QkNXY1l1eENxSys0aDJrK0VHQk54NGFlenZJK2p2NFBXT1haakRNa0RLSWFUTHF0a1VWK3U2WllEWGNNYVlUN2daK3ZPNlF3Snp4UzEwLzVjem42V1hLVmQwUTJGK0J3NDRWSXEiLCJtYWMiOiIyZmE4MzY5M2Q3OWEyODk4YWFiMTI2MGY3ZDY1NmZkZWI1MzQ2ZThmZDc3YThmOTYyN2RjMzlmMmM1ZmE5ZWEyIiwidGFnIjoiIn0%3D; bnovo_session=eyJpdiI6Im5QVGkwM2Z3TjcxUWJDQWd3KzZnZUE9PSIsInZhbHVlIjoiUEVMNW1ITGtrUmZPcEZ6SjNzT2pONWVFRjNadko2MHZNOWVncFIzQlZLaUlLV1pwK3lzMG01VGJJMHV1Vmo5UkJTWURJZEZIVEdONXhBUS9RTHVFdVUzS2I4Y244R2VjSnFnWFBZYit2b2lwU1ZqRTdyekdZeVhFY0ZmSDl4S0UiLCJtYWMiOiJjYWM5M2E3M2ZiOTBiZjY5NWVmM2E5NjI5MjA0MTc4MmI1NzY5NTU3YzViZTQzODUyYjAzNjA5MzIzYWE2NGQ3IiwidGFnIjoiIn0%3D'
```

Ответ:

```
{
    "result": 1
}
```


* GET: /guests/{id} - получение гостя по ID

Запрос:
```
curl --location 'http://localhost:8000/guests/1' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6Ikh1a1VOb1FRRkxndldTeERsc3gvV0E9PSIsInZhbHVlIjoiV0xWc2Y3SlhBV2lxbGw1WkZwVlFkYW54dEZaNHZtWExheStxcllLRlJDdGhkOXduU0JiQWpqcHdjeVdxSFk2YUhVcEhWL2drQ3Jad1ZyOE0wVEFzakdTTm9qZ3RGYmJKLzBUekpXRzdzMHAwN3F1SExudER4M1BZaFA5QnU0cFAiLCJtYWMiOiI2Y2QxMjI4MDBiYTBlMmRkZWM0ZDJlMmNjMWYzMGEwNWY2NWFmZGJmMzA0MTE4YmNhNWZkZWUwMWNiZjYwN2JmIiwidGFnIjoiIn0%3D; bnovo_session=eyJpdiI6ImdwQ0plWlE3eldwZUF6T2dTb1hFeXc9PSIsInZhbHVlIjoiNHNwM1QxWlcrQjJBWmduWGxacDkvczlHOFN5RkFIdDc3cWppeFNGMld6aVgvVHlKOWtYb2xpYmFEZ1l6aXVETXdkMnk4NVQwTUVRTlg2SHlqblRrTUNHakY1ZDVndXcwYXRyYVFLZkdQUk9JT3V3OTdBVVJIS0RkOFdGTTFOTWIiLCJtYWMiOiJjMTIwMWJkMjEwZDE5OTJhNDMxNjYyMTUyMjY2MDEzN2I4NTZmYmM3NTY4ZDE5Y2Y1Y2M1ZDMyZWI5MjMwMmE4IiwidGFnIjoiIn0%3D'
```


Ответ:
```
{
    "id": 1,
    "name": "Григорийq",
    "sername": "Фомин",
    "email": "aravion1@gmail.com",
    "phone": "8(999)464-53-96",
    "country": "Россия"
}
```

На задание ушли расхлябанные 2 часа (Отвлекался и прочее)
Что я бы улучшил:
* нормализовал базу (Помогло бы оптимизировать память - страны имена и фамилии разнес бы по таблицам)
* Добавил бы токен и middleware
* Проработал бы получше валидацию, сделал бы регулярку на проверку разных форматов телефонов
* Вынес бы volume базы в отдельную папку, чтобы была возможность не терять данные при какой либо проблеме с контейнером
* автоматизировать выполнение миграций и composer update

По хорошему надо было методы запихнуть в swagger, но честно - так лень было:D
Не стал делать, так как по большей части это просто испытательное ТЗ а не продуктовая фича.
