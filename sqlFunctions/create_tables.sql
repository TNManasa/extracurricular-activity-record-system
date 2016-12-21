

CREATE TABLE IF NOT EXISTS users(
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  email VARCHAR(60)  NOT NULL ,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(60)NOT NULL,
  rank VARCHAR(30)DEFAULT NULL,
  flag TINYINT(1) NOT NULL DEFAULT '0',
 
  PRIMARY KEY (id),
  UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS students (
  index_no VARCHAR(7) NOT NULL ,
  first_name VARCHAR(60) NOT NULL ,
  last_name VARCHAR(60) NOT NULL ,
  gender TINYINT(1) NOT NULL ,
  dob DATE NOT NULL ,
  batch INT(11) NOT NULL,
  user_id INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (index_no),
  INDEX (user_id) ,
   FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE CASCADE);

CREATE TABLE IF NOT EXISTS activities (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  student_id VARCHAR(7)NOT NULL,
  activity_type TINYINT(4) NOT NULL,
  start_date DATE DEFAULT NULL,
  end_date VARCHAR(10) DEFAULT NULL,
  effort INT(11) NOT NULL,
  description TEXT DEFAULT NULL,
  image INT(11) NOT NULL ,
  PRIMARY KEY (id) ,
	INDEX (student_id) ,
    FOREIGN KEY (student_id)
    REFERENCES students (index_no)
	);
	


CREATE TABLE IF NOT EXISTS achievements(
  id INT(10) UNSIGNED NOT NULL ,
  achievement_name VARCHAR(30) NOT NULL ,
  PRIMARY KEY (id),
    FOREIGN KEY (id)
    REFERENCES activities (id)
	);

CREATE TABLE IF NOT EXISTS admin (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(60)NOT NULL,
  last_name VARCHAR(60) NOT NULL ,
  user_id INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (id),
  INDEX (user_id) ,
  
    FOREIGN KEY (user_id)
    REFERENCES users (id)
	ON DELETE CASCADE);


CREATE TABLE IF NOT EXISTS competition_activities(
  id INT(10) UNSIGNED NOT NULL,
  competition_name VARCHAR(30) NOT NULL ,
  status VARCHAR(30) NOT NULL,
  PRIMARY KEY (id) ,
    FOREIGN KEY (id)
    REFERENCES activities(id)
	);


CREATE TABLE IF NOT EXISTS organizations (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  organization_name VARCHAR(30) NOT NULL,
  PRIMARY KEY (id) ,
  UNIQUE(organization_name) );


CREATE TABLE IF NOT EXISTS org_activities (
  id INT(10) UNSIGNED NOT NULL ,
  org_id INT(10) UNSIGNED NOT NULL,
  project_name VARCHAR(30) DEFAULT NULL ,
  role VARCHAR(30) NOT NULL ,
  PRIMARY KEY (id) ,
  INDEX  (org_id ) ,
    FOREIGN KEY (id)
    REFERENCES activities(id)
	,
  
    FOREIGN KEY (org_id)
    REFERENCES organizations (id)
	);


CREATE TABLE IF NOT EXISTS sports (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  sport_name VARCHAR(30)  NOT NULL ,
  PRIMARY KEY (id) );


CREATE TABLE IF NOT EXISTS sport_activities (
  id INT(10) UNSIGNED NOT NULL ,
  sport_id INT(10) UNSIGNED NOT NULL ,
  role VARCHAR(30) NOT NULL,
  PRIMARY KEY (id) ,
  INDEX (sport_id),
    FOREIGN KEY (id)
    REFERENCES activities (id)
	,
  
    FOREIGN KEY (sport_id)
    REFERENCES sports (id)
	);


CREATE TABLE IF NOT EXISTS supervisors (
  emp_id VARCHAR(10) NOT NULL ,
  first_name VARCHAR(60)  NOT NULL ,
  last_name VARCHAR(60) NOT NULL ,
  position VARCHAR(30)  NOT NULL ,
  user_id INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (emp_id) ,
  INDEX  (user_id) ,
  
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE CASCADE );

CREATE TABLE IF NOT EXISTS validations (
  validation_id INT(10) UNSIGNED NOT NULL,
  rating INT(11) NOT NULL ,
  validation_description VARCHAR(100) NOT NULL ,
  supervisor_id VARCHAR(10)  NOT NULL ,
  validated_date DATE NOT NULL ,
  is_validated TINYINT(4) NOT NULL,
  PRIMARY KEY (validation_id) ,
  INDEX  (supervisor_id) ,

    FOREIGN KEY (supervisor_id)
    REFERENCES supervisors (emp_id),
  
    FOREIGN KEY (validation_id)
    REFERENCES activities (id));
