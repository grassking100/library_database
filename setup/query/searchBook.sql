#SELECT * FROM (library.book as b natural join library.author as a );#left outer join library.publisher as p on b.publisher_id=p.publisher_id; 
#SELECT book_name,publish_date,language,email,a.name as author_name,p.name as publisher_name ,a.email as author_email,p.phone_number as publisher_phone,p.address as publisher_address,a.phone_number as author_phone FROM book as b left outer join book_has_author as ba natural join author as a on b.book_id=ba.book_id left outer join library.publisher as p on b.publisher_id=p.publisher_id;
#SELECT * from book as b left outer join book_has_author as ba natural join author as a on b.book_id=ba.book_id left outer join library.publisher as p on b.publisher_id=p.publisher_id;
SELECT book_name,publish_date,language,email,a.name as author_name,p.name as publisher_name ,a.email as author_email,p.phone_number as publisher_phone,p.address as publisher_address,a.phone_number as author_phone FROM library.book as b left outer join library.book_has_author as ba natural join library.author as a on b.book_id=ba.book_id left outer join library.publisher as p on b.publisher_id=p.publisher_id;