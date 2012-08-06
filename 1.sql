CREATE TABLE board(
	id INT AUTO_INCREMENT NOT NULL,
	title VARCHAR(50),
	contents TEXT,
	write_date timestamp NOT NULL,
	PRIMARY KEY(id)
)

CREATE TABLE comment(
	id INT AUTO_INCREMENT NOT NULL,
	contents TEXT,
	board_id INT NOT NULL,
	write_date timestamp NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(board_id) REFERENCES board(id) ON DELETE CASCADE
)

DROP TABLE board;

DROP TABLE comment;

DELETE FROM board WHERE id = 2;

DELETE FROM comment WHERE board_id = 0;

DELETE FROM comment;

SELECT contents FROM comment WHERE board_id=15;

SELECT COUNT(*) FROM comment WHERE board_id=15;

UPDATE board SET title='sdfsdg', contents='shdsa' where id=4;

CREATE TABLE member(
	uid INT AUTO_INCREMENT NOT NULL,
	email VARCHAR(35) NOT NULL,
	password VARCHAR(15) NOT NULL,
	username VARCHAR(20) NOT NULL,
	sex VARCHAR(7) NOT NULL,
	cellphone VARCHAR(15) NOT NULL,
	PRIMARY KEY(uid)
)

SELECT * FROM board ORDER BY id DESC LIMIT 0, 11;

SELECT * FROM board WHERE contents LIKE '%¾È%';

SELECT COUNT(id) AS total FROM board WHERE contents LIKE '%Àß%';

SELECT * FROM board;

UPDATE board SET write_date '2012-07-29 11:30:05' WHERE id=1;

DROP TABLE member;

SELECT email, password, username FROM member WHERE email='thooy@naver.com'