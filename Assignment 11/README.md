# Employee Task Management System

This project demonstrates how the **same Spring Boot application** can be built, tested, packaged, and run using:

1. Maven
2. Gradle

## Tech Stack

- Java 17
- Spring Boot 3.3.5
- JUnit 5

## Project Features

- Create employee task
- View all tasks
- Update task
- Delete task
- Filter tasks by status (`TODO`, `IN_PROGRESS`, `DONE`)

## How to Run (Quick Steps)

1. Open terminal in project root:

```bash
cd "E:\TY LABS SCOE\WTL\Assignment 11"
```

2. Verify Java/Maven/Gradle installation:

```bash
java -version
mvn -version
gradle -version
```

3. Choose **one** build tool and run the app:

- Maven flow: use commands from [Build and Run with Maven](#build-and-run-with-maven)
- Gradle flow: use commands from [Build and Run with Gradle](#build-and-run-with-gradle)

4. After app starts, test API at:

- `http://localhost:8080/api/tasks`

5. Stop the running app with:

```bash
Ctrl + C
```

## REST API Endpoints

- `GET /api/tasks`
- `POST /api/tasks`
- `PUT /api/tasks/{id}`
- `DELETE /api/tasks/{id}`
- `GET /api/tasks/status/{status}`

Example `POST` payload:

```json
{
  "employeeName": "Asha",
  "title": "Prepare Monthly Report",
  "description": "Compile status from all teams",
  "status": "TODO",
  "dueDate": "2026-04-25"
}
```

## Build and Run with Maven

### 1. Clean and Compile

```bash
mvn clean compile
```

### 2. Run Tests

```bash
mvn test
```

### 3. Package Executable JAR

```bash
mvn clean package
```

Generated artifact:

- `target/employee-task-management-1.0.0.jar`

### 4. Run Application

```bash
mvn spring-boot:run
```

Or run packaged jar:

```bash
java -jar target/employee-task-management-1.0.0.jar
```

### 5. Verify Running Application

Open browser or API client:

- `http://localhost:8080/api/tasks`

## Build and Run with Gradle

### 1. Clean and Compile

```bash
gradle clean classes
```

### 2. Run Tests

```bash
gradle test
```

### 3. Package Executable JAR

```bash
gradle clean bootJar
```

Generated artifact:

- `build/libs/employee-task-management-1.0.0.jar`

### 4. Run Application

```bash
gradle bootRun
```

Or run packaged jar:

```bash
java -jar build/libs/employee-task-management-1.0.0.jar
```

### 5. Verify Running Application

Open browser or API client:

- `http://localhost:8080/api/tasks`

## Example API Test Commands (Optional)

Get all tasks:

```bash
curl http://localhost:8080/api/tasks
```

Create task:

```bash
curl -X POST http://localhost:8080/api/tasks \
  -H "Content-Type: application/json" \
  -d '{"employeeName":"Asha","title":"Prepare Monthly Report","description":"Compile status from all teams","status":"TODO","dueDate":"2026-04-25"}'
```

## Suggested College Demonstration Flow

1. Show source code once (`src/main/java`) to prove same codebase.
2. Execute Maven lifecycle: compile -> test -> package -> run.
3. Stop app and execute Gradle lifecycle: classes -> test -> bootJar -> bootRun.
4. Call API endpoints in Postman/curl for both runs.
5. Compare generated artifacts (`target/` vs `build/libs/`).

## Notes

- This project uses an in-memory service (no external database required).
- Ensure Java 17 is installed.
- Ensure both Maven and Gradle are installed and available in `PATH`.
- If Gradle fails on very new JDKs (for example Java 26), set `JAVA_HOME` to JDK 21 before running Gradle:

```powershell
$env:JAVA_HOME='C:\Program Files\Microsoft\jdk-21.0.10.7-hotspot'
$env:Path="$env:JAVA_HOME\\bin;$env:Path"
```
