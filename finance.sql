--1��useraccount���л�ö�Ӧuname���ֽ�

select cash from useraccount where uname='$uname'

--2��login
select * from users  where uname='$uname' and upass='$pass'



--3register
�������users�в����ڴ��û�,������ע��
select *  from users where uname='$username';
--����users,money��ʼ��10000
insert into  users  values('$username','$pass','$email',10000);
--����ʼ�������ݲ���useraccount��
insert into  useraccount  values('$username',10000);




--4fbuy.php��,����,�����������stock,���ǵ�users��money��useraccount�е�cash�ǲ�һ����
--money����cash����stock��Ʊ�ļ۸������Ʊ����,���ǵ�moneyҲ����,���ֽ�Ͳ���ı�.

select cash from useraccount where uname='$userid'

update useraccount set cash='$shengyu' where uname='$userid'

--������ǻ��ĳ���û���ĳ��symbolname��sum( num ) ����.

SELECT sum( num ) FROM userbuyorsell WHERE symbol = '$symbolname' AND uname = '$userid'

--������ǻ��ĳ���û���ĳ��symbolname��sum( num ) �۸�

SELECT nowprice FROM userbuyorsell WHERE symbol = '$symbolname' AND uname = '$userid'

--����userbuyorsell,��Ҫ��������֪���˼۸��Ƿ�����,ͨ�����ݿ��еĴ���nowprice������ĳ��˾price�Ĳ��,
--�ͻ�֪�������Ƿ�Ӯ��.

insert into userbuyorsell values('$userid','$symbolname','buy',$num,'$price','$time')

select money from users where uname='$userid'

update users set money='$money' where uname='$userid'

--5testfsell.php�е�SQL��fbuy.php�е�ԭ����
--�����������ǲ�֪��,�����Ƿ�ӯ��.
SELECT sum(num) FROM userbuyorsell where symbol='$sellsymbol';

"SELECT nowprice FROM userbuyorsell where symbol='$sellsymbol';

SELECT money FROM users where uname='$userid';

update users set money='$newmoney' where uname='$userid'

SELECT cash FROM useraccount where uname='$userid'

update useraccount set cash='$newcash' where uname='$userid'

"insert into userbuyorsell values('$userid','$sellsymbol','sell',$sellnum,'$price','$time')"