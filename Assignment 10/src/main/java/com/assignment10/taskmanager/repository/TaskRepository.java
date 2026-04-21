package com.assignment10.taskmanager.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.assignment10.taskmanager.model.Task;

public interface TaskRepository extends JpaRepository<Task, Long> {
	List<Task> findByEmployeeId(Long employeeId);
}
