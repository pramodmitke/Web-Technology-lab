package com.assignment10.taskmanager;

import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

import com.assignment10.taskmanager.model.Employee;
import com.assignment10.taskmanager.model.Task;
import com.assignment10.taskmanager.model.TaskPriority;
import com.assignment10.taskmanager.model.TaskStatus;
import com.assignment10.taskmanager.repository.EmployeeRepository;
import com.assignment10.taskmanager.repository.TaskRepository;

@Component
public class DataSeeder implements CommandLineRunner {

	private final EmployeeRepository employeeRepository;
	private final TaskRepository taskRepository;

	public DataSeeder(EmployeeRepository employeeRepository, TaskRepository taskRepository) {
		this.employeeRepository = employeeRepository;
		this.taskRepository = taskRepository;
	}

	@Override
	public void run(String... args) {
		if (employeeRepository.count() > 0) {
			return;
		}

		Employee ananya = new Employee("Dr. Ananya Patil", "Computer Engineering", "ananya.patil@college.edu", "Associate Professor");
		Employee rahul = new Employee("Prof. Rahul Joshi", "Information Technology", "rahul.joshi@college.edu", "Assistant Professor");
		Employee priya = new Employee("Ms. Priya Deshmukh", "Mechanical Engineering", "priya.deshmukh@college.edu", "Lab Incharge");

		employeeRepository.save(ananya);
		employeeRepository.save(rahul);
		employeeRepository.save(priya);

		taskRepository.save(new Task("Exam Duty", "Assist with invigilation during the end-semester examination.", TaskPriority.HIGH, TaskStatus.IN_PROGRESS, "2026-04-20", ananya));
		taskRepository.save(new Task("Project Guide Allocation", "Review project batches and allocate guide responsibilities.", TaskPriority.MEDIUM, TaskStatus.PENDING, "2026-04-22", rahul));
		taskRepository.save(new Task("Event Coordination", "Coordinate annual technical symposium logistics.", TaskPriority.HIGH, TaskStatus.PENDING, "2026-04-25", priya));
	}
}
