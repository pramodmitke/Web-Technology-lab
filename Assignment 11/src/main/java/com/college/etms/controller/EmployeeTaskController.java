package com.college.etms.controller;

import com.college.etms.model.Employee;
import com.college.etms.model.Task;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
public class EmployeeTaskController {

    private List<Employee> employees = new ArrayList<>();
    private List<Task> tasks = new ArrayList<>();

    public EmployeeTaskController() {
        employees.add(new Employee(1L, "Abhi", "Developer"));
        tasks.add(new Task(1L, "Write build automation code"));
    }

    @GetMapping("/employees")
    public List<Employee> getEmployees() {
        return employees;
    }

    @PostMapping("/employees")
    public Employee addEmployee(@RequestBody Employee employee) {
        employee.setId((long) (employees.size() + 1));
        employees.add(employee);
        return employee;
    }

    @GetMapping("/tasks")
    public List<Task> getTasks() {
        return tasks;
    }
}
