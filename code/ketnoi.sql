-- insert into groups(group_name, group_detail) values ('admin','admin');
-- insert into users (user_name,user_fullname, user_sdt, user_gioitinh, user_namsinh, group_id) values ('test','nguyanv an a',0909333999,1,1990,1);
-- insert into auth(user_id, user_pass) values ('3','test2');
-- select user_pass from auth  where user_id = (select user_id from users where user_name = 'test');
select auth.user_pass, users.user_name 
from auth, users 
where (users.user_id = auth.user_id and users.user_id = 2);

INSERT INTO `duong` (`duong_id`, `duong_name`) VALUES
(1, '3 Tháng 2'),
(2, 'Hùng Vương'),
(3, 'Ngô Quyền'),
(4, 'Ngô Văn Sở'),
(5, 'Nguyễn Trãi'),
(6, 'Nguyễn Tri Phương'),
(7, 'Trần Hưng Đạo');
