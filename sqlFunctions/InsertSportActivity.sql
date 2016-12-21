Delimiter $

drop procedure if exists InsertSportActivity $
CREATE PROCEDURE InsertSportActivity(var_student_id VARCHAR(7),var_activity_type TINYINT,var_start_date DATE,var_end_date VARCHAR(10),var_effort INT,var_description TEXT,var_image TINYINT,var_sport_id TINYINT,var_role VARCHAR(30))
  BEGIN
	DECLARE id INT;
  DECLARE success INT;

	DECLARE EXIT handler FOR sqlexception
      BEGIN
        rollback;
        SET @success = 0;
      end;

    DECLARE EXIT handler FOR sqlwarning
      BEGIN
        rollback;
        SET @success = 0;
      end;

	SET @id = 0;


    START TRANSACTION;

      insert into activities (student_id,activity_type,start_date,end_date,effort,description,image) values (var_student_id,var_activity_type,var_start_date,var_end_date,var_effort,var_description,var_image);

	  SET @id= LAST_INSERT_ID();

      insert into  sport_activities (id, sport_id,role) values (@id,var_sport_id,var_role);
    commit;
    SET @success = 1;
    SELECT @success,@id;
  end
  $

delimiter ;