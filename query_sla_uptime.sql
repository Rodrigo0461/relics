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


SELECT u.id,s.id,s.NamePrestador, s.NameFinanciador,s.time, s.Dayxweek  ,u.cod_financiador, u.financiador, u.timestamp
FROM SLA112014 s INNER JOIN uptime u
WHERE s.NamePrestador='Servicios De Salud Integrados' 
AND s.NameFinanciador='Colmena' 
AND s.NameFinanciador=u.financiador 
AND s.Dayxweek=4 AND u.timestamp > '2016-08-18 21:12:00'
AND s.time > '21:26:00' AND time < '21:40:00' AND u.estado=0
GROUP BY u.id;
