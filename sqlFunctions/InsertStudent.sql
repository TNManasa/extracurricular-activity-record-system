Delimiter $

drop procedure if exists InsertStudent $
CREATE PROCEDURE InsertStudent(var_index_no VARCHAR(255),var_email VARCHAR(255),var_first_name VARCHAR(255),var_last_name VARCHAR(255),var_gender tinyInt,var_batch INT, var_dob DATE,var_password VARCHAR(255))
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
	
      insert into users (email,password,role) values (var_email,var_password,"blah blah");
	  
	  SET @A= (select id from users where email = var_email LIMIT 1);
      
      insert into students (index_no, first_name, last_name,gender,user_id,dob,batch) values (var_index_no,var_first_name,var_last_name,var_gender,@A,var_dob,var_batch);
    commit;
  end
  $

delimiter ;