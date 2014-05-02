-- select auth.user_pass, users.user_name 
-- from auth, users 
-- where (users.user_id = auth.user_id and users.user_id = 2);
select users.user_name, auth.user_pass from auth, users where users.user_id = auth.user_id GROUP BY user_name;
SELECT CONCAT_WS(users.user_name,auth.user_pass)
				FROM auth,users
				WHERE 
				users.user_id = auth.user_id
				AND	users.user_name = 'test'
				AND auth.user_pass= 'text'
				LIMIT 1;

select *
from nhatro, phuong
where nhatro.phuong_id = phuong.phuong_id;

-- group
insert into groups(group_name, group_detail) values('admin','quản trị viên');

/* 
nhatro
START TRANSACTION;
INSERT INTO users (user_id,user_name,user_fullname,user_sdt,user_gioitinh,user_namsinh)
    VALUES(NULL,'admin','Admin','0909888999','1','1990');         # generate ID by inserting NULL
INSERT INTO auth (user_id,user_pass)
    VALUES(LAST_INSERT_ID(),'d033e22ae348aeb5660fc2140aec35850c4da997');  # use ID in second table
COMMIT;
*/
/*
SELECT CONCAT_WS(users.user_name,auth.user_pass) FROM auth,users 
WHERE users.user_name = 'admin' AND auth.user_pass = 'd033e22ae348aeb5660fc2140aec35850c4da997'
 LIMIT 1;
*/
START TRANSACTION;
INSERT INTO nhatro (nhatro_id,phuong_id,user_id,nhatro_name,nhatro_mota,nhatro_sdt,nhatro_diachi,nhatro_gia,nhatro_trangthai,nhatro_soluong)
    VALUES(NULL,'1','1','2','Nhà trọ 1a','Mô tả');         # generate ID by inserting NULL
INSERT INTO auth (user_id,user_pass)
    VALUES(LAST_INSERT_ID(),'d033e22ae348aeb5660fc2140aec35850c4da997');  # use ID in second table
COMMIT;