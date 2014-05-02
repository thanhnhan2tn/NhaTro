SELECT * FROM csdl_n8.nhatro;
insert into quan(quan_name) value ('Ninh Kiều');

insert into phuong(quan_id,phuong_name) value ('1','Xuân Khánh');

insert into nhatro (phuong_id,user_id,nhatro_name,nhatro_mota,nhatro_sdt,nhatro_diachi,nhatro_gia, nhatro_trangthai,nhatro_soluong)
values ('1','2','Nhà trọ fdf','mô tcdcdcả 123','0909999000','so 1','1900000','1','10');

SELECT COUNT(nhatro_id)
FROM nhatro;
 