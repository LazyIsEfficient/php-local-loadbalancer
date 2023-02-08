# Slim 4 Load Balanced Skeleton
This repo is meant to help developers have a load-balanced php backend starting point.
PHP is setup in a load-balanced environment where Session data is written to Redis.

Here is an example of the logs.
```
[2023-02-08T15:15:38.882801+00:00] php.INFO: REQUEST HANDLED ON ["172.28.0.7","33a08de176bb","tcp://redis:6379",0] []
[2023-02-08T15:15:39.523120+00:00] php.INFO: REQUEST HANDLED ON ["172.28.0.6","f6fa755f18b1","tcp://redis:6379",1] []
[2023-02-08T15:15:40.082311+00:00] php.INFO: REQUEST HANDLED ON ["172.28.0.8","a58d94ae208e","tcp://redis:6379",2] []
[2023-02-08T15:15:40.831349+00:00] php.INFO: REQUEST HANDLED ON ["172.28.0.7","33a08de176bb","tcp://redis:6379",3] []
```
You will notice the host changes between requests but session state persists between the requests

## Launching Dev Environment
- `docker-compose up -d --scale app-proxy=3 --scale app=3`

## Browser
- `http://localhost:29010/`
