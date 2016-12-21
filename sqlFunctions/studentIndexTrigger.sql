Delimiter $
drop TRIGGER if exists IndexInsertion $
CREATE TRIGGER IndexInsertion BEFORE INSERT ON students
FOR EACH ROW 

BEGIN
DECLARE x1 CHAR(1);
DECLARE x2 CHAR(1);
DECLARE x3 CHAR(1);
DECLARE x4 CHAR(1);
DECLARE x5 CHAR(1);
DECLARE x6 CHAR(1);
DECLARE y CHAR(1);
SET @x1 = SUBSTRING(NEW.index_no,1,1);
SET @x2 = SUBSTRING(NEW.index_no,2,1);
SET @x3 = SUBSTRING(NEW.index_no,3,1);
SET @x4 = SUBSTRING(NEW.index_no,4,1);
SET @x5 = SUBSTRING(NEW.index_no,5,1);
SET @x6 = SUBSTRING(NEW.index_no,6,1);
SET @y = SUBSTRING(NEW.index_no,-1);
IF
	(SELECT @y REGEXP '[[:digit:]]+') 
	OR (SELECT @x1 REGEXP '[[:alpha:]]+')
	OR (SELECT @x2 REGEXP '[[:alpha:]]+')
	OR (SELECT @x3 REGEXP '[[:alpha:]]+')
	OR (SELECT @x4 REGEXP '[[:alpha:]]+')
	OR (SELECT @x5 REGEXP '[[:alpha:]]+')
	OR (SELECT @x6 REGEXP '[[:alpha:]]+')
	OR NEW.gender<1
	OR NEW.gender>2
	
THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot add or update row:that kind of index doesnot exist';
		END IF;
END;
$
Delimiter ;