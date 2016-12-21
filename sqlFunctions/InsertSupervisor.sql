Delimiter $

drop procedure if exists InsertSupervisor $
CREATE PROCEDURE InsertSupervisor(var_emp_id VARCHAR(255),var_email VARCHAR(255),var_first_name VARCHAR(255),var_last_name VARCHAR(255),var_position VARCHAR(255),var_password VARCHAR(255))
  BEGIN 
	DECLARE A INT;
	
	DECLARE EXIT handler FOR sqlexception
      BEGIN
        rollback;
      end;

    DECLARE EXIT handler FOR sqlwarning
      BEGIN
        rollback;
      end;
	  
	SET @A = 0;

    START TRANSACTION;
      insert into users (email,password,role) values (var_email,var_password,"supervisor");  
	  SET @A= SELECT last_insert_id(); 
      insert into supervisors (emp_id, first_name, last_name,position,user_id) values (var_emp_id,var_first_name,var_last_name,var_position,@A);
   
	commit;
  end
  $

delimiter ;