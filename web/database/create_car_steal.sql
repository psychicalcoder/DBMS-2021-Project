create table car_steal(
    code int NOT NULL,
    category varchar(20) NOT NULL,
    date date NOT NULL,
    time_start int,
    time_end int,
    location varchar(80),
    lat float,
    lng float,
    primary key (code)
);

load data local infile './car_steal_pos.csv'
into table car_steal
fields terminated by ','
lines terminated by '\n'
ignore 1 lines;
