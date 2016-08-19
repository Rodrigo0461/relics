SELECT s.NamePrestador, s.NameFinanciador,s.time, s.Dayxweek  ,u.cod_financiador, u.financiador, u.timestamp
FROM SLA112014 s, uptime u 
WHERE s.NamePrestador='Clinica Las Lilas S.A.' 
AND   s.NameFinanciador=u.financiador
AND   s.Dayxweek=4
AND u.timestamp >'2016-07-17' AND <='2016-07-18';




SELECT s.NamePrestador, s.NameFinanciador,s.time, s.Dayxweek  ,u.cod_financiador, u.financiador, u.timestamp FROM 
SLA112014 s, uptime u  
WHERE s.NamePrestador='Clinica Las Lilas S.A.' 
AND   s.NameFinanciador=u.financiador 
AND   s.Dayxweek=4 AND u.timestamp >='2016-07-17' 
AND u.timestamp<='2016-07-19';


mysql> describe SLA112014;
+-----------------+--------------+------+-----+---------+----------------+
| Field           | Type         | Null | Key | Default | Extra          |
+-----------------+--------------+------+-----+---------+----------------+
| Week            | int(10)      | YES  |     | NULL    |                |
| Dayxweek        | int(10)      | YES  |     | NULL    |                |
| Hour            | varchar(10)  | YES  |     | NULL    |                |
| Minute          | varchar(10)  | YES  |     | NULL    |                |
| BonosResBonos   | int(100)     | YES  |     | NULL    |                |
| SRBMTotal       | int(100)     | YES  |     | NULL    |                |
| SRBAporteFinan  | int(100)     | YES  |     | NULL    |                |
| SRBAporteSeg    | int(100)     | YES  |     | NULL    |                |
| SRBCopagoBenef  | int(100)     | YES  |     | NULL    |                |
| NameFinanciador | varchar(100) | YES  |     | NULL    |                |
| NamePrestador   | varchar(100) | YES  |     | NULL    |                |
| id              | int(11)      | NO   | PRI | NULL    | auto_increment |
| time            | time         | NO   |     | NULL    |                |
+-----------------+--------------+------+-----+---------+----------------+
13 rows in set (0.00 sec)






 
mysql> describe uptime;
+-----------------+------------------+------+-----+-------------------+-----------------------------+
| Field           | Type             | Null | Key | Default           | Extra                       |
+-----------------+------------------+------+-----+-------------------+-----------------------------+
| id              | int(10) unsigned | NO   | PRI | NULL              | auto_increment              |
| cod_financiador | int(10)          | NO   |     | NULL              |                             |
| financiador     | varchar(50)      | NO   |     | NULL              |                             |
| timestamp       | timestamp        | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
| estado          | tinyint(1)       | YES  |     | NULL              |                             |
| Bono3           | tinyint(1)       | NO   |     | 0                 |                             |
+-----------------+------------------+------+-----+-------------------+-----------------------------+
6 rows in set (0.00 sec)




