package com.assignment10.taskmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.assignment10.taskmanager.model.Employee;

public interface EmployeeRepository extends JpaRepository<Employee, Long> {
}
