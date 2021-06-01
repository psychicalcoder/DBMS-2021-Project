create table random_snatch(
    code int NOT NULL,
    category varchar(20) NOT NULL,
    date date NOT NULL,
    time_start int,
    time_end int,
    location varchar(80),
    primary key(code)
);

load data local infile './random_snatch.csv'
into table random_snatch
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;