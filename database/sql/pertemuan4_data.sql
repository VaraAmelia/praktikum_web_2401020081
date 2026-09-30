
USE praktikum_web_2401020081;

INSERT INTO program_studi (nama_prodi) VALUES
    ('Teknik Sipil'),
    ('Arsitektur');

INSERT INTO mahasiswa
    (nim, nama, email, usia, program_studi_id)
VALUES
    ('2401080081', 'Vara Amelia', 
     'vara@umrah.com', 20, 1),
    ('2401080078', 'Sheren Naomi', 
     'sheren@umrah.com', 19, 1),
    ('2401080079', 'Ria Ayunani', 
     'rias@umrah.com', 21, 2),
    ('2401080080', 'Ivone Purba', 
     'ivone@umrah.com', 22, 2);

UPDATE mahasiswa
SET email = 'vara15@example.com'
WHERE nim = '2401080081';

DELETE FROM mahasiswa
WHERE nim = '2401080081';

SELECT m.nim, m.nama, m.email, m.usia,
       p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p
    ON p.id = m.program_studi_id
ORDER BY m.n