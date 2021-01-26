
/*CREATE VIEW P_E_EMPLOYEE
AS
SELECT  EMPLOYEE.EMPNO AS 'EMPLOYEE_NO',
        NAME1 AS 'EMPLOYEE_NAME1',
        NAME2 AS 'EMPLOYEE_NAME2',
        pho_em_empolee.Phone,
        pho_em_empolee.Email
FROM EMPLOYEE,	pho_em_empolee
WHERE EMPLOYEE.EMPNO = pho_em_empolee.EMPNO*/

CREATE VIEW emp
AS
SELECT  EMPLOYEE.EMPNO AS 'NO',
        ALA AS 'Name'
FROM EMPLOYEE;


CREATE VIEW I_Ami_v
AS
SELECT  EMPLOYEE.EMPNO AS 'emp NO',
        EMPLOYEE.ALA AS 'emp1 Name',
        emp.NO AS 'emp NO2',
        emp.Name AS 'emp2 Name'
FROM EMPLOYEE,IAmi,emp
WHERE IAmi.EMPNO = EMPLOYEE.EMPNO
AND
iami.EMPAMINO = emp.NO;


CREATE VIEW Ami_v
AS
SELECT  EMPLOYEE.EMPNO AS 'emp NO',
        EMPLOYEE.ALA AS 'emp1 Name',
        emp.NO AS 'emp NO2',
        emp.Name AS 'emp2 Name'
FROM EMPLOYEE,Ami,emp
WHERE Ami.EMPNO = EMPLOYEE.EMPNO
AND
ami.EMPAMINO = emp.NO;


CREATE VIEW massge_v
AS
SELECT  EMPLOYEE.EMPNO AS 'emp NO',
        EMPLOYEE.ALA AS 'emp1 Name',
        emp.NO AS 'emp NO2',
        emp.Name AS 'emp2 Name',
        massge,
        date
FROM EMPLOYEE,massge,emp
WHERE massge.id1 = EMPLOYEE.EMPNO
AND
massge.id2 = emp.NO;



/*
SELECT * FROM `massge_v` WHERE (`emp NO` = 1
OR
`emp NO2` = 1)
AND
(
`emp NO` = 3
OR
`emp NO2` = 3
)
ORDER by 'date'
*/


/*
SELECT  EMPLOYEE.EMPNO AS 'EMPLOYEE_NO',
        EMPLOYEE.ALA AS 'EMPLOYEE_NAME1',
        IAmi.EMPNO AS 'EMPLOYEE_NO',
        IAmi.EMPAMINO AS 'EMPLOYEE_NAME2'
FROM EMPLOYEE,IAmi
WHERE IAmi.IID = EMPLOYEE.EMPNO
*/

/*
CREATE VIEW Ami
AS
SELECT  EMPLOYEE.EMPNO AS 'EMPLOYEE_NO',
        Ami.EMPAMINO AS 'EMPLOYEE_NO',
        NAME1 AS 'EMPLOYEE_NAME1',
        NAME2 AS 'EMPLOYEE_NAME2'
FROM EMPLOYEE,Ami
WHERE Ami.EMPAMINO = EMPLOYEE.EMPNO
*/
