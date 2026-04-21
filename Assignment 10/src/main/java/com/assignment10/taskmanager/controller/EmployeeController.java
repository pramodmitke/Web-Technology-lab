package com.assignment10.taskmanager.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.assignment10.taskmanager.model.Employee;
import com.assignment10.taskmanager.service.EmployeeService;

import jakarta.validation.Valid;

@Controller
@RequestMapping("/employees")
public class EmployeeController {

	private final EmployeeService employeeService;

	public EmployeeController(EmployeeService employeeService) {
		this.employeeService = employeeService;
	}

	@GetMapping
	public String listEmployees(Model model) {
		model.addAttribute("employees", employeeService.findAll());
		return "employees";
	}

	@GetMapping("/new")
	public String showCreateForm(Model model) {
		model.addAttribute("employee", new Employee());
		return "employee-form";
	}

	@PostMapping
	public String saveEmployee(@Valid @ModelAttribute("employee") Employee employee, BindingResult bindingResult) {
		if (bindingResult.hasErrors()) {
			return "employee-form";
		}
		employeeService.save(employee);
		return "redirect:/employees";
	}

	@GetMapping("/{id}/edit")
	public String showEditForm(@PathVariable Long id, Model model) {
		Employee employee = employeeService.findById(id).orElseThrow(() -> new IllegalArgumentException("Employee not found"));
		model.addAttribute("employee", employee);
		return "employee-form";
	}

	@PostMapping("/{id}")
	public String updateEmployee(@PathVariable Long id, @Valid @ModelAttribute("employee") Employee employee, BindingResult bindingResult) {
		employee.setId(id);
		if (bindingResult.hasErrors()) {
			return "employee-form";
		}
		employeeService.save(employee);
		return "redirect:/employees";
	}

	@PostMapping("/{id}/delete")
	public String deleteEmployee(@PathVariable Long id) {
		employeeService.deleteById(id);
		return "redirect:/employees";
	}
}
