/*
*Table1 image1
*/
select  *,(cas23/total) as global from tdb_performance_liv where 1=1
AND agence =100
AND  dateedition='2020-05-06'
ORDER BY global DESC

i+=1
                    nTotal+=sd.total
                    nOnlivrelivreur+=sd.nonlivrelivreur
                    ngloballivrer+=sd.cas23
/*
*table 3 image3
*/
SELECT
SUM(total) as total,
SUM(CAS0800) as CAS0800,
SUM(CAS0830) as CAS0830,
SUM(CAS0900) as CAS0900,
SUM(CAS0930) as CAS0930,
SUM(CAS1000) as CAS1000,
SUM(CAS1030) as CAS1030,
SUM(CAS1100) as CAS1100,
SUM(CAS1130) as CAS1130,
SUM(CAS1200) as CAS1200,
SUM(CAS1230) as CAS1230,
SUM(CAS1300) as CAS1300,
SUM(CAS1330) as CAS1330,
SUM(CAS1400) as CAS1400,
SUM(CAS1430) as CAS1430,
SUM(CAS1500) as CAS1500,
SUM(CAS1530) as CAS1530,
SUM(CAS1600) as CAS1600,
SUM(CAS1630) as CAS1630,
SUM(CAS1700) as CAS1700,
SUM(CAS1730) as CAS1730,
SUM(CAS1800) as CAS1800,
SUM(CAS1830) as CAS1830,
SUM(CAS1900) as CAS1900,
SUM(CAS2000) as CAS2000,
SUM(CAS2200) as CAS2200,
SUM(CAS2300) as CAS2300
FROM  tdb_performance_tranche_agence
WHERE aaaa="+madate..Année+" AND mm="+madate..Mois+" AND jj <>"+dd..Jour+"
AND agence=100

/*
*Table2 Image2
*/
SELECT distinctdate.jj as j, tdb_performance_jour.*
FROM distinctdate
JOIN tdb_performance_jour
ON distinctdate.dateedition = tdb_performance_jour.dateedition
and tdb_performance_jour.aaaa="+dd..Année+"
and tdb_performance_jour.mm="+dd..Mois+"
and agence="+COMBO_VILLE..ValeurMémorisée+"
AND  distinctdate.jj >="+(dd..Jour)+"
order by j asc
/*--------------------------------------------------------------------------------------------------------------------*/
SELECT tdb_performance_jour.*
JOIN tdb_performance_jour
WHERE tdb_performance_jour.aaaa=2020
and tdb_performance_jour.mm=05
and agence=100
AND  tdb_performance_jour.jj <=11
order by jj asc



select distinct(destinataire) as destinataire ,cl.matricule
from expedition
  inner join cl
    on expedition.numerocl=cl.numerocl
  inner join utilisateurs
    on utilisateurs.matricule=cl.matricule
WHERE agence="+COMBO_VILLE..ValeurMémorisée+"
 and dateedition ='"+Remplace(sd2.dateedition,"-","")+"
/**************************************************************/
SELECT distinctdate.jj as j, tdb_performance_jour.*
FROM distinctdate
JOIN tdb_performance_jour
ON distinctdate.dateedition = tdb_performance_jour.dateedition
and tdb_performance_jour.aaaa=2020
and tdb_performance_jour.mm=05
and agence=100
AND  distinctdate.jj >=11
order by j asc

SELECT distinctdate.jj AS j, tdb_performance_jour. *
FROM distinctdate
JOIN tdb_performance_jour ON distinctdate.dateedition = tdb_performance_jour.dateedition
WHERE tdb_performance_jour.dateedition <= '2020-05-11'
AND agence =100
ORDER BY j ASC
LIMIT 0 , 31
/**/
SELECT  
             SUM(total) as total,
             SUM(CAS0800) as CAS0800, 
             SUM(CAS0830) as CAS0830, 
             SUM(CAS0900) as CAS0900, 
             SUM(CAS0930) as CAS0930, 
             SUM(CAS1000) as CAS1000, 
             SUM(CAS1030) as CAS1030, 
             SUM(CAS1100) as CAS1100, 
             SUM(CAS1130) as CAS1130, 
             SUM(CAS1200) as CAS1200, 
             SUM(CAS1230) as CAS1230, 
             SUM(CAS1300) as CAS1300, 
             SUM(CAS1330) as CAS1330, 
             SUM(CAS1400) as CAS1400, 
             SUM(CAS1430) as CAS1430, 
             SUM(CAS1500) as CAS1500, 
             SUM(CAS1530) as CAS1530, 
             SUM(CAS1600) as CAS1600, 
             SUM(CAS1630) as CAS1630, 
             SUM(CAS1700) as CAS1700, 
             SUM(CAS1730) as CAS1730, 
             SUM(CAS1800) as CAS1800, 
             SUM(CAS1830) as CAS1830, 
             SUM(CAS1900) as CAS1900, 
             SUM(CAS2000) as CAS2000, 
             SUM(CAS2200) as CAS2200, 
             SUM(CAS2300) as CAS2300  
       FROM 
             tdb_performance_tranche_agence 
WHERE aaaa=2020 AND mm=05 AND jj <=11  
AND agence=100
