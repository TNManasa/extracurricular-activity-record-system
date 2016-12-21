Delimiter $
drop TRIGGER if exists IndexInsertion $
CREATE TRIGGER IndexInsertion BEFORE INSERT ON students
FOR EACH ROW 

BEGIN
DECLARE x CHAR(6);
SET @x = SUB

IF 
	NEW.index_n
THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot add or update row:that kind of batch_no doesnot exist';
		END IF;
END;
$
Delimiter ;