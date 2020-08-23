# University-Web-App-PHP

A web application developed for the course "Database Systems 2". The use of the application is for access in information about courses, students and teachers in a specific University. It provides two different options of usage. First one is to use it as an administrator, the second one is to use it as a simple user(can be either student or teacher).

The administrator can create all the necessary tables and views for the database after using the unique credentials to connect to the application. Specifically, the administrator is able to:

1.Show all students (student, teacher).select_all_students.php)
2.Show all teachers (student, teacher).select_all_teachers.php)
3.Show all courses (student, teacher).select_all_courses.php)
4.Show the courses that one student is enrolled in (student, teacher).select_course_by_teacher.php)
5.Show the students that are enrolled in one course (student, teacher).select_student_by_course.php)
6.Show the teacher that teaches given course (student, teacher).select_teacher_by_course.php)
7.Show the course that the given teacher is giving (student, teacher).select_course_by_teacher.php)
8.Show the average of one student (student, teacher).average_of_student.php)
9.Show the total of teaching hours for a teacher (student, teacher).sum_teaching_hours.php)
10.Show the number of students in a course (student, teacher).num_of_students_course.php)
11.Other choice (student, teacher).dynamic_select.html)

The other choice is to connect as a simple user which can be:

1)Student
A student is able to:
1.Enroll in course. (student, teacher).enroll.php)
2.View my grades. (student, teacher).view_grades.php)
3.View my profile. (student, teacher).view_profile.php)
4.View profiles of teachers that teach my courses. (student, teacher).view_teachers_profile.php)
5.View all available courses. (student, teacher).select_all_courses.php)
6.View my courses. (student, teacher).view_my_courses.php)

2)Teacher
A teacher is able to:
1.View my profile. (student, teacher).view_teacher_profile.php)
2.View courses I teach (student, teacher).view_my_teaching_courses.php)
3.Show the number of students in specific course. (student, teacher).select_num_of_students_in_course.php)
4.Enter the title of the course you want to update a grade. (student, teacher).check_update.php, update_grade.php)
