create table user_account (
u_id int(4),
u_name varchar(15), 
pass varchar(23), 
f_name varchar(10), 
l_name varchar(10),
email varchar(30),
st_address varchar(30),
state varchar(15),
zip int(5)
);

create table bookings (
booking_id int (10),
departure_city varchar (20),
detination_city varchar (20),
departure_date date
);
