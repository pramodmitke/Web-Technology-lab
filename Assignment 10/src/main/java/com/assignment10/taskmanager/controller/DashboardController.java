package com.assignment10.taskmanager.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.assignment10.taskmanager.service.EmployeeService;
import com.assignment10.taskmanager.service.TaskService;

@Controller
public class DashboardController {

	private final EmployeeService employeeService;
	private final TaskService taskService;

	public DashboardController(EmployeeService employeeService, TaskService taskService) {
		this.employeeService = employeeService;
		this.taskService = taskService;
	}

	@GetMapping({"/", "/dashboard"})
	public String dashboard(Model model) {
		model.addAttribute("employeeCount", employeeService.count());
		model.addAttribute("employees", employeeService.findAll());
		model.addAttribute("tasks", taskService.findAll());
		return "dashboard";
	}
}
