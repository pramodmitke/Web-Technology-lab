package com.assignment10.taskmanager.service;

import java.util.List;
import java.util.Optional;

import org.springframework.stereotype.Service;

import com.assignment10.taskmanager.model.Employee;
import com.assignment10.taskmanager.model.Task;
import com.assignment10.taskmanager.model.TaskStatus;
import com.assignment10.taskmanager.repository.EmployeeRepository;
import com.assignment10.taskmanager.repository.TaskRepository;

@Service
public class TaskService {

	private final TaskRepository taskRepository;
	private final EmployeeRepository employeeRepository;

	public TaskService(TaskRepository taskRepository, EmployeeRepository employeeRepository) {
		this.taskRepository = taskRepository;
		this.employeeRepository = employeeRepository;
	}

	public List<Task> findAll() {
		return taskRepository.findAll();
	}

	public Optional<Task> findById(Long id) {
		return taskRepository.findById(id);
	}

	public Task save(Task task, Long employeeId) {
		Employee employee = employeeRepository.findById(employeeId)
				.orElseThrow(() -> new IllegalArgumentException("Employee not found"));
		task.setEmployee(employee);
		return taskRepository.save(task);
	}

	public Task save(Task task) {
		return taskRepository.save(task);
	}

	public void deleteById(Long id) {
		taskRepository.deleteById(id);
	}

	public Task updateStatus(Long id, TaskStatus status) {
		Task task = taskRepository.findById(id)
				.orElseThrow(() -> new IllegalArgumentException("Task not found"));
		task.setStatus(status);
		return taskRepository.save(task);
	}

	public List<Task> findByEmployeeId(Long employeeId) {
		return taskRepository.findByEmployeeId(employeeId);
	}
}
