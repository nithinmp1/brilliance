DROP TABLE question;
CREATE TABLE question (
    question_id INT AUTO_INCREMENT  PRIMARY KEY ,
    question text,
    option1 text,
    option2 text,
    option3 text,
    option4 text,
    option5 text,
    answer text,
    stream_id int(10),
    prilims SMALLINT,
    main SMALLINT,
    sslc SMALLINT,
    hsc SMALLINT,
    degree SMALLINT,
    subject_id SMALLINT,
    section_id SMALLINT,
    topic SMALLINT,
    model SMALLINT,
    have_explanation SMALLINT,
    explanation_id SMALLINT,
    have_image SMALLINT,
    negative_mark varchar(50),
    mark varchar(50),
    lang varchar(10),
    enabled_for_quiz SMALLINT,
    question_type SMALLINT,
    created_by SMALLINT,
    status SMALLINT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE subject (
    subject_id INT AUTO_INCREMENT  PRIMARY KEY ,
    name varchar(20)
);

CREATE TABLE section (
    section_id INT AUTO_INCREMENT  PRIMARY KEY ,
    subject_id SMALLINT,
    name varchar(20)
);

CREATE TABLE explanation (
    explanation_id INT AUTO_INCREMENT  PRIMARY KEY ,
    explanation text
);

CREATE TABLE quiz_setup (
    quiz_setup_id INT AUTO_INCREMENT  PRIMARY KEY,
    title varchar(100),
    questionCount text,
    total_time varchar(10),
    message text    
);

CREATE TABLE quiz_setup (
    quiz_req_id INT AUTO_INCREMENT  PRIMARY KEY,
    user_agent varchar(100),
    ipaddress varchar(20),
    city varchar(10),
    region varchar(10),
    country varchar(10),
    score SMALLINT,    
    mobile SMALLINT    
);

ALTER DATABASE brilliance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE question CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO quiz_setup (title, questionCount, total_time) VALUES ('John', 5, 10);

ALTER TABLE quiz_req ALTER COLUMN mobile varchar(20);

ALTER TABLE quiz_req DROP COLUMN mobile;

ALTER TABLE quiz_req ADD mobile varchar(20);