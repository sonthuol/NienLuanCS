drop database if exists tgdd;
create database tgdd character set='utf8';
use tgdd;

create table admin(
	id_ad int(255) not null auto_increment primary key,
	username varchar(100) not null,
	pass varchar(100) not null
);
drop table if exists thanhvien;
create table thanhvien(
	id int(255) not null auto_increment primary key,
	hoten_tv varchar(255) not null,
	tentaikhoan varchar(100) not null,
	matkhau varchar(200) not null,
	email varchar(200) not null,
	sdt varchar(20) not null,
	path_anh_tv varchar(500) not null,
	diachi text not null
);

insert into admin value (null,'admin', 'admin');

create table loaisp(
	ma_loaisp varchar(20) not null primary key,
	ten_loaisp varchar(200) not null
);


/*insert into loaisp value ('ĐT', 'Điện Thoại');
insert into loaisp value ('LT', 'LapTop');*/
drop table if exists thuonghieu;
create table thuonghieu(
	id_th int(255) not null auto_increment primary key,
	ma_loaisp varchar(20) not null,
	foreign key (ma_loaisp) references loaisp(ma_loaisp),
	ma_th varchar(200) not null,
	ten_tenth varchar(200) not null,
	img_th varchar(400) not null
);

/*insert into thuonghieu value (null, 'ĐT', 'IP','Iphone', '123');
insert into thuonghieu value (null, 'ĐT', 'OP','Oppo', '123');
insert into thuonghieu value (null, 'ĐT', 'AS','Asus', '123');
insert into thuonghieu value (null, 'LT', 'MAC','Macbook', '123');
insert into thuonghieu value (null, 'LT', 'Dell','Dell', '123');
insert into thuonghieu value (null, 'LT', 'AS','Asus', '123');
insert into thuonghieu value (null, 'LT', 'Acer','Acer', '123');*/
drop table if exists sanpham;
create table sanpham(
	id_sp int(255) not null  auto_increment primary key,
	ma_loaisp varchar(20) not null,
	foreign key (ma_loaisp) references loaisp(ma_loaisp),
	id_th int(255) not null,
	foreign key (id_th) references thuonghieu(id_th),
	ten_sp varchar(100) not null,
	gia_sp float not null,
	gia_ban float not null,
	img_sp varchar(200) not null,
	mausac varchar(200),
	sl_sp int(255) not null,
	sosao int(255) not null,
	danhgia int (255) not null,
	khuyenmai varchar(255) not null,
	giatrikhuyenmai int(255),
	phantramgiam int(255),
	ngaybatdau_km timestamp,
	ngayketthuc_km timestamp,
	ngay_tao timestamp,
	ngay_update timestamp,
	trangthaisp int not null
);

/*insert into sanpham value (null, 'ĐT', '10', 'Iphone5', '10000000', '1234', '100', null, null);*/

drop table if exists ds_img;
create table ds_img(
	id_anh int(255) not null auto_increment primary key,
	id_sp int(255) not null,
	foreign key (id_sp) references sanpham(id_sp),
	img text not null,
	mau varchar(50) not null
);

drop table if exists giohang;
create table giohang(
	id_gh int(255) not null auto_increment primary key,
	id int(255) not null,
	foreign key (id) references thanhvien(id),
	id_sp int(255) not null,
	foreign key (id_sp) references sanpham(id_sp),
	soluong int(255) not null,
	trangthai int(255) not null
);

drop table if exists nhanvien_giaohang;
create table nhanvien_giaohang(
	id_nvgh int (255) not null auto_increment primary key,
	ten_nvgh varchar(255) not null,
	sdt1 varchar(255) not null,
	sdt2 varchar(255)
);


drop table if exists nhanvien;
create table nhanvien(
	id_nv int (255) not null auto_increment primary key,
	ten_nv varchar(255) not null,
	tentaikhoan_nv varchar(255) not null,
	matkhau_nv varchar(255) not null,
	sdt_nv varchar(255) not null
);



drop table if exists hoadon;
create table hoadon(
	id_hd int(255) not null auto_increment primary key,
	id int(255) not null,
	foreign key (id) references thanhvien(id),
	id_nv int(255) not null,
	foreign key (id_nv) references nhanvien(id_nv),
	id_nvgh int(255) not null,
	foreign key (id_nvgh) references nhanvien_giaohang(id_nvgh),
	ngay_dathang timestamp,
	noi_nhanhang text not null,
	ghichu text
);


drop table if exists chitiethoadon;
create table chitiethoadon(
	id_cthd int(255) not null auto_increment primary key,
	id_hd int(255) not null,
	foreign key (id_hd) references hoadon(id_hd),
	id_sp int(255) not null,
	foreign key (id_sp) references sanpham(id_sp),
	dongia float not null,
	sl_sp int (255) not null, 
	thanhtien float not null
);

drop table if exists thongsokithuat;
create table thongsokithuat(
		id_sp int (255) not null,
		foreign key (id_sp) references sanpham(id_sp),
		ma_loaisp varchar(20) not null,
		foreign key (ma_loaisp) references loaisp(ma_loaisp),
		manhinh text null,
		hedieuhanh text null,
		camera_truoc text null,
		camera_sau text null,
		cpu text null,
		ram text null,
		bonhotrong text null,
		sim text null,
		dungluongpin text null,
		o_cung text null,
		card_manhinh text null,
		congketnoi text null,
		thietke text null,
		kichthuoc text null,
		thoidiemramat text null,
		ketnoimang text null,
		hotrosim text null,
		congnghemanhinh text null,
		kichthuocmanhinh text null,
		thoigiansudungpin text null,
		ketnoivoihedieuhanh text null,
		chatlieumat text null,
		duongkinhmat text null,
		ketnoi text null,
		ngonngu text null,
		theodoisuckhoe text null
);

drop table if exists danhgiasp;
create table danhgiasp(
	id_bl int(255) not null auto_increment primary key, 
	id_sp int(255) not null,
	foreign key (id_sp) references sanpham(id_sp),
	hoten_nguoibinhluan varchar(255) not null,
	sodienthoai_nguoibinhluan varchar(11) not null,
	email_nguoibinhluan varchar(255),
	img_binhluan text not null,
	sosao int(255) not null,
	noidungdanhgia text,
	ngaydanhgia timestamp
);





