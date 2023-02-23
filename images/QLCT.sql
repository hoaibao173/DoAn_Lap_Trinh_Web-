--1
select nv.manv,nv.honv+' '+ nv.tennv as ho_va_ten,nv.phai
from NHANVIEN nv
--2
select nv.manv,nv.honv+' '+ nv.tennv as hoten,nv.mucluong,nv.phai
from NHANVIEN nv
--3
select distinct nv.mucluong
from NHANVIEN nv
--4
select nv.manv,nv.honv+' '+ nv.tennv as hoten,nv.mucluong,nv.phai
from NHANVIEN nv
where nv.mucluong between 5000000 and 7000000
--5
select cn.tencn chinhanhkhongtruongphong, cn.manvptr
from CHINHANH cn
where cn.manvptr is null
--6
select nv.manv,nv.honv, nv.tennv,nv.ngaysinh,nv.phai
from NHANVIEN nv
where nv.honv like N'L?%'
--7
select ct.tenct, ct.ngaykt,ct.mact
from CONGTRINH ct
where ct.ngaykt= '2010-12-10'and ct.mact like N'%03'
--8
select nv.manv,nv.honv,nv.tennv,nv.ngaysinh,nv.phai
from NHANVIEN nv
where nv.phai=N'nữ'
--9
select nv.manv,nv.honv, nv.tennv,(getdate()-nv.ngaysinh(yyyy))as tuoi
from NHANVIEN nv
where nv.manv='C03'
order by 