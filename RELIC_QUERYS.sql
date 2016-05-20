#QUERYS
--------------------------------------------------------------------------------------------------------------------------------------------
SELECT distinct f.financiador, s.NameFinanciador,s.NamePrestador 
FROM uptime f, SLA112014 s 
WHERE f.financiador=s.NameFinanciador AND f.financiador='Colmena';
-------------------------------------------------------------------------------------------------------------------------------------------

SELECT distinct f.financiador, s.NameFinanciador,s.NamePrestador 
FROM uptime f, SLA112014 s 
WHERE f.financiador=s.NameFinanciador AND f.financiador='Colmena' ;
--------------------------------------------------------------------------------------------------------------------------------------------

SELECT distinct f.financiador, s.NameFinanciador,s.NamePrestador,s.Dayxweek 
FROM   uptime f, SLA112014 s 
WHERE f.financiador=s.NameFinanciador AND f.financiador='Colmena' AND Dayxweek=2 AND Hour=12 AND Minute=	1;
--------------------------------------------------------------------------------------------------------------------------------------------

SELECT *
FROM uptime
WHERE financiador='Colmena';
--------------------------------------------------------------------------------------------------------------------------------------------

SELECT distinct f.financiador, s.NamePrestador,s.Dayxweek,s.Hour,s.Minute, s.SRBMtotal as TOTAL 
FROM uptime f, SLA112014 s 
WHERE f.financiador=s.NameFinanciador AND f.financiador='Colmena' AND Dayxweek=2 AND Hour=12 AND Minute
BETWEEN 1 AND 5; 
---------------------------------------------------------------------------------------------------------------------------------------------

SELECT distinct f.financiador, s.NamePrestador,s.Dayxweek, CONCAT (s.Hour,':',s.Minute) AS HORA, s.SRBMtotal as TOTAL 
FROM uptime f, SLA112014 s
WHERE f.estado=1 AND f.financiador=s.NameFinanciador AND f.financiador='Colmena' AND Dayxweek=2 AND Hour=12 AND Minute BETWEEN 1 AND 5;
----------------------------------------------------------------------------------------------------------------------------------------------

SELECT distinct f.financiador, s.NamePrestador,s.Dayxweek, CONCAT (s.Hour,':',s.Minute) AS HORA, s.SRBMtotal as TOTAL 
FROM uptime f, SLA112014 s
WHERE f.estado=1 AND f.financiador=s.NameFinanciador AND f.financiador=$id AND Dayxweek=2 AND Hour=12 AND Minute BETWEEN 1 AND 5;
-----------------------------------------------------------------------------------------------------------------------------------------------

SELECT distinct f.financiador, s.NamePrestador,s.Dayxweek, CONCAT (s.Hour,':',s.Minute) AS HORA, s.SRBMtotal as TOTAL 
FROM uptime f, SLA112014 s 
WHERE  f.financiador=s.NameFinanciador AND f.cod_financiador=88 AND Dayxweek=2 AND Hour=12 AND Minute BETWEEN 1 AND 5;
----------------------------------------------------------------------------------------------------------------------------

