package com.assignment10.taskmanager.service;

import java.util.List;
import java.util.Optional;

import org.springframework.stereotype.Service;

import com.assignment10.taskmanager.model.Employee;
import com.assignment10.taskmanager.repository.EmployeeRepository;

@Service
public class EmployeeService {

	private final EmployeeRepository employeeRepository;

	public EmployeeService(EmployeeRepository employeeRepository) {
		this.employeeRepository = employeeRepository;
	}

	public List<Employee> findAll() {
		return employeeRepository.findAll();
	}

	public Optional<Employee> findById(Long id) {
		return employeeRepository.findById(id);
	}

	public Employee save(Employee employee) {
		return employeeRepository.save(employee);
	}

	public void deleteById(Long id) {
		employeeRepository.deleteById(id);
	}

	public long count() {
		return employeeRepository.count();
	}
}
