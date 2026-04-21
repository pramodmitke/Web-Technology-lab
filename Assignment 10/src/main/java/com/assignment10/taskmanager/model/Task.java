package com.assignment10.taskmanager.model;

import jakarta.persistence.Entity;
import jakarta.persistence.EnumType;
import jakarta.persistence.Enumerated;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

@Entity
@Table(name = "tasks")
public class Task {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;

	@NotBlank(message = "Task title is required")
	private String title;

	@NotBlank(message = "Task description is required")
	private String description;

	@Enumerated(EnumType.STRING)
	@NotNull(message = "Priority is required")
	private TaskPriority priority;

	@Enumerated(EnumType.STRING)
	@NotNull(message = "Status is required")
	private TaskStatus status = TaskStatus.PENDING;

	@NotBlank(message = "Due date is required")
	private String dueDate;

	@ManyToOne
	@JoinColumn(name = "employee_id")
	private Employee employee;

	public Task() {
	}

	public Task(String title, String description, TaskPriority priority, TaskStatus status, String dueDate, Employee employee) {
		this.title = title;
		this.description = description;
		this.priority = priority;
		this.status = status;
		this.dueDate = dueDate;
		this.employee = employee;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public TaskPriority getPriority() {
		return priority;
	}

	public void setPriority(TaskPriority priority) {
		this.priority = priority;
	}

	public TaskStatus getStatus() {
		return status;
	}

	public void setStatus(TaskStatus status) {
		this.status = status;
	}

	public String getDueDate() {
		return dueDate;
	}

	public void setDueDate(String dueDate) {
		this.dueDate = dueDate;
	}

	public Employee getEmployee() {
		return employee;
	}

	public void setEmployee(Employee employee) {
		this.employee = employee;
	}
}
