PRAGMA foreign_keys = ON;

drop table if exists photo;
drop table if exists week_portfolio;
drop table if exists subject_class;
drop table if exists subject;
drop table if exists student;



create table student (
    id integer primary key autoincrement,
    username text not null,
	password text not null,
    email text not null,
	CONSTRAINT user_unique_error UNIQUE (email)
	CONSTRAINT user_unique_error UNIQUE (username)
);

insert into student (username, email) values ('José Pinhal', 'josepinhal@mail.com');
insert into student (username, email) values ('Tozé Brito', 'tozebrito@mail.com');
insert into student (username, email) values ('José Cid', 'josecid@mail.com');
	

select * from student;
	
	
	
create table subject (
	id integer primary key autoincrement,
	name text not null,
	folder_path text,
	admin_id integer references student(id) not null
);

insert into subject (name, folder_path, admin_id) values ('SIBD', '/SIBD', 1);
insert into subject (name, folder_path, admin_id) values ('LPRO', '/LPRO', 3);
	
select * from subject;



create table subject_class (
	id integer primary key autoincrement,
	weekday text not null,
	start_hour integer not null,
	start_min integer not null,
	end_hour integer not null,
	end_min integer not null,
	subject_id integer references subject(id) not null,
	constraint weekday_incorrect check (weekday = 'monday' OR weekday = 'tuesday' OR weekday = 'wednesday' OR weekday = 'thursday' OR weekday = 'friday'),
	constraint start_hour_must_be_greater_than_end_hour check (end_hour >= start_hour)
);

insert into subject_class (weekday, start_hour, start_min, end_hour, end_min, subject_id) 
	values (
		'tuesday', 
		13,
		30,
		14,
		00,
		1
);

select * from subject_class;



create table week_portfolio (
	id integer primary key,
	folder_path text,
	subject_id integer references subject(id) not null
);

insert into week_portfolio (id, folder_path, subject_id) values (1, 'SIBD/week1', 1);

select * from week_portfolio;

	
	
create table photo (
	id integer primary key autoincrement,
	week_portfolio_id integer references week_portfolio(id) not null
);

insert into photo (week_portfolio_id) values (1);

select * from photo;
