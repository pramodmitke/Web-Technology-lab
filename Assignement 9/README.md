# Spring Boot Hello-World Web Service

This project demonstrates a simple Spring Boot web service with:
- Auto-configuration
- Embedded Tomcat server
- Basic request handling
- REST endpoint

## Endpoints
- `/` -> Shows a webpage with **Hello-World**
- `/api/hello` -> Returns JSON: `{ "message": "Hello-World" }`

## Requirements
- Java 17+
- Maven 3.8+

## Run the application
From the project root, run:

```powershell
mvn spring-boot:run
```

Then open:
- `http://localhost:8080/`
- `http://localhost:8080/api/hello`
