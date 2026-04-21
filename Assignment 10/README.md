# Assignment 10 - Employee Task Management System

This is a Spring Boot application for the Engineering Department to manage faculty details and assigned work in one place.

## What The Application Does

- Stores employee information such as name, department, email, and designation.
- Lets you create, edit, list, and delete employees.
- Lets you assign tasks to employees.
- Tracks task priority, status, and due date.
- Provides a dashboard for quick overview.

## How I Created It

The project was built as a standard Spring Boot MVC application.

1. I created the Maven project structure with Spring Boot dependencies.
2. I added entity classes for `Employee` and `Task`.
3. I connected them with JPA so each task belongs to one employee.
4. I created repository interfaces for database access.
5. I added service classes to keep business logic separate from controllers.
6. I built MVC controllers for employee and task screens.
7. I designed Thymeleaf pages for dashboard, employee management, and task management.
8. I used H2 database for easy local testing.
9. I added seed data so the app opens with sample employees and tasks.

## Tech Stack

- Spring Boot 3
- Spring MVC
- Spring Data JPA
- Thymeleaf
- H2 Database
- Bean Validation

## Project Structure

- `src/main/java/.../model` - entity and enum classes
- `src/main/java/.../repository` - JPA repository interfaces
- `src/main/java/.../service` - service layer
- `src/main/java/.../controller` - web controllers
- `src/main/resources/templates` - Thymeleaf pages
- `src/main/resources/static/css` - custom styling

## How To Run

### Prerequisites

- Java 17 or newer
- Maven installed on your system

### Where To Save The Project

Save the project folder anywhere on your computer, but keep the full path simple and without special issues if possible. For example:

```text
E:\TY LABS SCOE\WTL\Assignment 10
```

If you already have the folder open in VS Code, keep the whole Spring Boot project inside that folder.

### Is A Database Connection Needed?

No separate database installation is needed for this assignment. The project uses H2, which is an in-memory database bundled with the application.

- You do not need to install MySQL or Oracle.
- You do not need to create a manual DB connection.
- The app creates the tables automatically when it starts.
- Sample records are added automatically on startup.

If you want to view the database, use the H2 console at:

```text
http://localhost:8080/h2-console
```

Login values:

- JDBC URL: `jdbc:h2:mem:taskdb`
- User Name: `sa`
- Password: leave blank

### How To Download And Install Maven On Windows

1. Open the official Apache Maven download page.
2. Download the binary zip file for the latest Maven version.
3. Extract it to a folder such as:

```text
C:\Program Files\Apache\Maven
```

4. Copy the extracted Maven folder path, for example:

```text
C:\Program Files\Apache\Maven\apache-maven-3.9.x
```

5. Add Maven to the Windows PATH environment variable.
6. Open a new terminal and check installation with:

```bash
mvn -v
```

If Maven is installed correctly, you will see the Maven version and Java version.

### Run From Terminal

Open a terminal in the project folder and run:

```bash
mvn spring-boot:run
```

If you want to build first, use:

```bash
mvn clean package
```

Then run the generated jar from the `target` folder.

### Open The App

After startup, open:

```text
http://localhost:8080
```

### H2 Console

Optional H2 console:

```text
http://localhost:8080/h2-console
```

Use these values when logging in.

## Notes

- The application uses an in-memory H2 database, so data resets when the app restarts.
- Sample employees and tasks are loaded automatically on startup.
- If Maven is not installed, install it first or use an IDE with Maven support.
