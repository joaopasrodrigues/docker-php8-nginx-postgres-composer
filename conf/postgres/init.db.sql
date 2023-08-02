create table db_versions (version serial, timestamp timestamp default now(), change_log text);
insert into db_versions(change_log) values ('Initial Version');
