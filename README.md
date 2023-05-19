# Patients_App

- Menggunakan phalcon 5
- Menggunakan VUE 3

# query membuat database, dan table

- CREATE DATABASE patientDB;

- USE patientDB; 

- CREATE TABLE Patient (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    sex varchar(255),
    religion varchar(255),
    phone varchar(255),
    nik varchar(255),
    address varchar(255),
    PRIMARY KEY (id)
); 

# Alur aplikasi
- Patient List
Berisikan list seluruh pasien, dengan melakukan klik pada list akan mengarahkan ke halaman detail pasien. Terdapat 2 tombola action:
    1. Delete: Untuk menghapus pasien
    2. Edit: Untuk mengubah data pasien
- New patient
Memuat form untuk menginput pasien baru.
