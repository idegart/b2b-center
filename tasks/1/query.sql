CREATE TABLE users
(
    id         INT(11) NOT NULL AUTO_INCREMENT,
    name       VARCHAR(255) DEFAULT NULL,
    gender     INT(11) NOT NULL COMMENT '0 - не указан, 1 - мужчина, 2 - женщина.',
    birth_date date    NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE phone_numbers
(
    id      INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    phone   VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
);

select u.name, count(*)
from users u
         left join phone_numbers pn on u.id = pn.user_id
where u.gender = 2
  and birth_date between DATE_SUB(CURDATE(), INTERVAL 18 YEAR) and DATE_SUB(CURDATE(), INTERVAL 22 YEAR)
group by u.id