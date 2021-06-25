create database udb;

create table users(user_id varchar(10),password varchar(20),levels integer(2), rating varchar(2),name varchar(30),phone integer(20), email varchar(20), address varchar(40), primary key(user_id));

insert into users values("100","100",1,"A","Vijya Gazdar",9832134412,"vg@gmail.com","KOLKATA");
insert into users values("200","200",2,"A","Mohun Ahuja",9832134412,"ma@gmail.com","KOLKATA");
insert into users values("300","300",3,"B","Sumit Vyas",9832134412,"sv@gmail.com","KOLKATA");
insert into users values("400","400",4,"B","Santosh Gupta",9832134412,"sg@gmail.com","KOLKATA");
insert into users values("500","500",5,"C","Neha Ahuja",9832134412,"na@gmail.com","KOLKATA");
insert into users values("600","600",6,"C","Shristi Thakur",9854334412,"st@gmail.com","KOLKATA");
insert into users values("700","700",7,"D","Ujali Gaur",9836554412,"ug@gmail.com","KOLKATA");
insert into users values("800","800",8,"D","Mohun Bhatta",9832134512,"mb@gmail.com","KOLKATA");
insert into users values("900","900",1,"A","Om Upasani",983213446512,"ou@gmail.com","KOLKATA");
insert into users values("1000","1000",2,"A","Jhanda Seth",9832134412,"js@gmail.com","KOLKATA");
insert into users values("1100","1100",3,"B","Bhima Viswan",9832135412,"bv@gmail.com","KOLKATA");
insert into users values("1200","1200",4,"D","Arun Sanyal",98321674312,"as@gmail.com","KOLKATA");
insert into users values("1300","1300",5,"D","Anu Devdhar",9832132312,"ad@gmail.com","KOLKATA");
insert into users values("1400","1400",6,"C","Saanvi Prabhu",9832122312,"sp@gmail.com","KOLKATA");
insert into users values("1500","1500",7,"D","Lia Sanyal",9832134321,"ls@gmail.com","KOLKATA");
insert into users values("1600","1600",8,"E","Yad Bajpeyi",9832134432,"yb@gmail.com","KOLKATA");


create table usertime(id varchar(10),user_id varchar(10),daycheck integer(2),starttime integer(10),endtime integer(10), primary key(id));

insert into usertime values('1',"300",0,0,96000);
insert into usertime values('2',"800",6,0,13800000);
insert into usertime values('3',"400",0,0,100000);
insert into usertime values('4',"600",0,0,500000);
insert into usertime values('5',"100",0,0,500000);
insert into usertime values('6',"200",0,0,100000);
insert into usertime values('7',"500",0,0,70000);
insert into usertime values('8',"700",0,0,10000);
insert into usertime values('9',"900",0,0,96000);
insert into usertime values('10',"1000",0,0,13800000);
insert into usertime values('11',"1100",0,0,100000);
insert into usertime values('12',"1200",0,0,500000);
insert into usertime values('13',"1300",0,0,500000);
insert into usertime values('14',"1400",0,0,100000);
insert into usertime values('15',"1500",0,60,70000);
insert into usertime values('16',"1600",0,0,10000);

create table id_generator(id varchar(1),val integer(100), primary key(id));

insert into id_generator values('m',9);
insert into id_generator values('t',9);
insert into id_generator values('s',9);
insert into id_generator values('a',9);
insert into id_generator values('d',9);
insert into id_generator values('c',9);
insert into id_generator values('l',9);
insert into id_generator values('e',9);

create table rating(rat varchar(20), maxl integer(20));

insert into rating values('A',10);
insert into rating values('B',8);
insert into rating values('C',6);
insert into rating values('D',4);
insert into rating values('E',2);

create table levels(user_id varchar(10), level_added integer(2), dates varchar(20), starttime integer(10), endtime integer(10), source_id varchar(10), user_entry integer(10) , del integer(10), edits integer(10));


create table checkdetails(user_id varchar(10), source_id varchar(10), levels integer(2), dates varchar(20), starttime integer(10), endtime integer(10), act_time varchar(20), res varchar(30));

create table changedetails(user_id varchar(10), source_id varchar(10), dates varchar(20), act_time varchar(20), b varchar(500),a varchar(500));

------------------------------------------------------------------------------------------------------------------

create database tdb;

create table teacher(teacher_id varchar(20),name varchar(20), address varchar(20), ph_number integer(20), email_id varchar(30),acess integer(2), primary key(teacher_id));

insert into teacher values("t1","Amar Gulati","DUMDUM",8954213651,"fhf@gmail.com",1);
insert into teacher values("t2","Ravi Bagchi","BEHALA",7985421365,"reui@gmail.com",2);
insert into teacher values("t3","Jagadis Vad","BEHALA",7985421366,"dipa9@gmail.com",3);
insert into teacher values("t4","Asha Gurnani","BEHALA",7985421366,"add9@gmail.com",4);
insert into teacher values("t5","Jayanti Kapil","BEHALA",7984321366,"apple9@gmail.com",5);
insert into teacher values("t6","Saryu Munshi","BEHALA",7985534366,"mago12@gmail.com",6);
insert into teacher values("t7","Arun Poddar","BEHALA",7985435366,"bana123@gmail.com",7);
insert into teacher values("t8","Rura Kashyap","BEHALA",7985244366,"puppy12@gmail.com",8);

------------------------------------------------------------------------------------------------------------------

create database sdb;

create table student(regn_id varchar(20), name varchar(30),address varchar(20),year_of_passing year, ph_number integer(20), status varchar(30), cgpa integer(10),acess integer(2),primary key(regn_id));


insert into student values("s1","Rahul Nayar","BEHALA",2018,8855458512,"AWESOME",98,1);
insert into student values("s2","Dhuleep Lata","DUM DUM",2018,9823459812,"GOOD",78,2);
insert into student values("s3","Roodra Mandalik","NAIHATI",2018,8068765210,"GOOD",75,3);
insert into student values("s4","Veer Vad","SEALDAH",2018,4556523694,"AVERAGE",65,4);
insert into student values("s5","Sukanya Chadda","SEALDAH",2018,9657423694,"GOOD",75,5);
insert into student values("s6","Komal Adhya","SEALDAH",2018,9865556784,"BAD",55,6);
insert into student values("s7","Tivra Tipanis","SEALDAH",2018,9865655494,"AWESOME",80,7);
insert into student values("s8","Anya Ahuja","SEALDAH",2018,9878675594,"AVERAGE",65,8);

------------------------------------------------------------------------------------------------------------------

create database mdb;


create table marks(marks_id varchar(20), student_id varchar(20), tenth integer(20), twelfth integer(20), ug integer(20), comments varchar(20), acess integer(2),primary key(marks_id,student_id));

insert into marks values("m1","100001",89,85,98,"GOOD",1);
insert into marks values("m2","100002",85,85,98,"GOOD",2);
insert into marks values("m3","100003",83,80,89,"GOOD",2);
insert into marks values("m4","100004",85,52,65,"POOR",3);
insert into marks values("m5","100005",75,75,72,"AVERAGE",4);
insert into marks values("m6","100006",72,62,75,"AVERAGE",5);
insert into marks values("m7","100007",70,60,55,"AVERAGE",6);
insert into marks values("m8","100008",52,82,55,"AVERAGE",7);


------------------------------------------------------------------------------------------------------------------
create database adb;

create table admins(a_id varchar(20), a_name varchar(20), contact_no integer(20), acess integer(2), primary key(a_id));

insert into admins values("a1","Souvik Pal",03321221232,1);
insert into admins values("a2","Biswadeb Mukherjee",03321221212,2);
insert into admins values("a3","Pallab Kishore Bera",03321222342,3);
insert into admins values("a4","Aditi Harish",03321236412,4);
insert into admins values("a5","Vayu Chetti",03321254212,5);
insert into admins values("a6","Siddhi Nandi",03321221567,6);
insert into admins values("a7","Madri Kayal",03321221987,7);
insert into admins values("a8","Alia Sinha",03321221345,8);


------------------------------------------------------------------------------------------------------------------
create database ddb;

create table department(d_id varchar(20), d_name varchar(20), ph_number integer(20), hod varchar(20), acess integer(2), primary key(d_id));

insert into department values("d1","MCA",0333323214,"Hala Gharapure",1);
insert into department values("d2","BCA",0333524514,"Sayana Prabhu",2);
insert into department values("d3","EEE",0333823214,"Govinda Khamavant",3);
insert into department values("d4","ECE",0333455214,"Dhani Dalavi",4);
insert into department values("d5","CSE",0333532114,"Ananda Panja",5);
insert into department values("d6","MBA",0332323214,"Chanda Ayyar",6);
insert into department values("d7","MBA",0332223214,"Yad Bajpeyi",7);
insert into department values("d8","MBA",0336723214,"Pandu Pavagi",8);

create table sections(s_id varchar(20), classroom varchar(20), timing varchar(20) , acess integer(2), primary key(s_id));

insert into sections values("l1","101A","9:00-17:00",1);
insert into sections values("l2","102A","9:00-17:00",2);
insert into sections values("l3","103A","9:00-17:00",3);
insert into sections values("l4","104A","9:00-17:00",4);
insert into sections values("l5","105A","9:00-17:00",5);
insert into sections values("l6","106A","9:00-17:00",6);
insert into sections values("l7","107A","9:00-17:00",7);
insert into sections values("l8","108A","9:00-17:00",8);

create table exam(e_id varchar(20), c_id varchar(20), pass_marks integer(20), acess integer(2), primary key(e_id));

insert into exam values("e1", "c1", 40, 1);
insert into exam values("e2", "c1", 40, 2);
insert into exam values("e3", "c2", 40, 3);
insert into exam values("e4", "c2", 40, 4);
insert into exam values("e5", "c3", 40, 5);
insert into exam values("e6", "c4", 40, 6);
insert into exam values("e7", "c4", 40, 7);
insert into exam values("e8", "c5", 40, 8);

create table course(c_id varchar(20), c_name varchar(20), qualification varchar(20), acess integer(2), primary key(c_id));

insert into course values("c1", "MCA", "BSC/BCA", 1);
insert into course values("c2", "BCA", "12", 2);
insert into course values("c3", "ENGG", "12", 3);
insert into course values("c4", "BSC", "12", 4);
insert into course values("c5", "MSC", "BSC/BCA", 5);
insert into course values("c6", "MTECH", "BTECH/MCA", 6);
insert into course values("c7", "MBA", "BBA/BCA/BSC", 7);
insert into course values("c8", "MSC", "BSC", 8);