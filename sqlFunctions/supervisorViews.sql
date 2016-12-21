CREATE VIEW IF NOT EXISTS student_activity AS select first_name,last_name,id,student_id,activity_type,start_date,end_date,effort,description,image from students RIGHT JOIN activities on students.index_no=activities.student_id;

CREATE VIEW IF NOT EXISTS validation_activities AS select * from activities RIGHT JOIN validations on activities.id=validations.validation_id;

CREATE VIEW IF NOT EXISTS complete_org_activities AS select organizations.id,organization_name,project_name,role from organizations RIGHT JOIN org_activities on organizations.id=org_activities.id;