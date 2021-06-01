create table bike_steal(
    code int NOT NULL,
    category varchar(20) NOT NULL,
    date date NOT NULL,
    time_start int,
    time_end int,
    location varchar(80),
    primary key (code)
);

load data local infile './bike_steal.csv'
into table bike_steal
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;