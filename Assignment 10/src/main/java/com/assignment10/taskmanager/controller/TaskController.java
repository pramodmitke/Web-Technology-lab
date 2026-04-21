package com.assignment10.taskmanager.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.assignment10.taskmanager.model.Task;
import com.assignment10.taskmanager.model.TaskStatus;
import com.assignment10.taskmanager.service.EmployeeService;
import com.assignment10.taskmanager.service.TaskService;

import jakarta.validation.Valid;

@Controller
@RequestMapping("/tasks")
public class TaskController {

	private final TaskService taskService;
	private final EmployeeService employeeService;

	public TaskController(TaskService taskService, EmployeeService employeeService) {
		this.taskService = taskService;
		this.employeeService = employeeService;
	}

	@GetMapping
	public String listTasks(Model model) {
		model.addAttribute("tasks", taskService.findAll());
		return "tasks";
	}

	@GetMapping("/new")
	public String showCreateForm(Model model) {
		model.addAttribute("task", new Task());
		model.addAttribute("employees", employeeService.findAll());
		model.addAttribute("statuses", TaskStatus.values());
		model.addAttribute("selectedEmployeeId", null);
		return "task-form";
	}

	@PostMapping
	public String saveTask(@Valid @ModelAttribute("task") Task task, BindingResult bindingResult, @RequestParam("employeeId") Long employeeId, Model model) {
		if (bindingResult.hasErrors()) {
			model.addAttribute("employees", employeeService.findAll());
			model.addAttribute("statuses", TaskStatus.values());
			model.addAttribute("selectedEmployeeId", employeeId);
			return "task-form";
		}
		taskService.save(task, employeeId);
		return "redirect:/tasks";
	}

	@GetMapping("/{id}/edit")
	public String showEditForm(@PathVariable Long id, Model model) {
		Task task = taskService.findById(id).orElseThrow(() -> new IllegalArgumentException("Task not found"));
		model.addAttribute("task", task);
		model.addAttribute("employees", employeeService.findAll());
		model.addAttribute("statuses", TaskStatus.values());
		model.addAttribute("selectedEmployeeId", task.getEmployee() != null ? task.getEmployee().getId() : null);
		return "task-form";
	}

	@PostMapping("/{id}")
	public String updateTask(@PathVariable Long id, @Valid @ModelAttribute("task") Task task, BindingResult bindingResult, @RequestParam("employeeId") Long employeeId, Model model) {
		task.setId(id);
		if (bindingResult.hasErrors()) {
			model.addAttribute("employees", employeeService.findAll());
			model.addAttribute("statuses", TaskStatus.values());
			model.addAttribute("selectedEmployeeId", employeeId);
			return "task-form";
		}
		taskService.save(task, employeeId);
		return "redirect:/tasks";
	}

	@PostMapping("/{id}/status")
	public String updateStatus(@PathVariable Long id, @RequestParam("status") TaskStatus status) {
		taskService.updateStatus(id, status);
		return "redirect:/tasks";
	}

	@PostMapping("/{id}/delete")
	public String deleteTask(@PathVariable Long id) {
		taskService.deleteById(id);
		return "redirect:/tasks";
	}
}
