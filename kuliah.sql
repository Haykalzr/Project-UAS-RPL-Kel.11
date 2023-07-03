DROP DATABASE IF EXISTS kuliah;

create database kuliah;

use kuliah;

create table mahasiswa(
npm char(13) primary key,
nama varchar(50),
jurusan varchar(50),
keterangan enum('Hadir', 'Sakit', 'Izin')
);
