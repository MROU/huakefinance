--1从useraccount表中获得对应uname的现金

select cash from useraccount where uname='$uname'

--2，login
select * from users  where uname='$uname' and upass='$pass'



--3register
查找如果users中不存在此用户,即可以注册
select *  from users where uname='$username';
--插入users,money初始化10000
insert into  users  values('$username','$pass','$email',10000);
--将初始化的数据插入useraccount中
insert into  useraccount  values('$username',10000);




--4fbuy.php中,分析,如果我们买了stock,我们的users中money与useraccount中的cash是不一样的
--money等于cash加上stock股票的价格如果股票上涨,我们的money也增大,但现金就不会改变.

select cash from useraccount where uname='$userid'

update useraccount set cash='$shengyu' where uname='$userid'

--下面的是获得某个用户买某个symbolname的sum( num ) 数量.

SELECT sum( num ) FROM userbuyorsell WHERE symbol = '$symbolname' AND uname = '$userid'

--下面的是获得某个用户买某个symbolname的sum( num ) 价格

SELECT nowprice FROM userbuyorsell WHERE symbol = '$symbolname' AND uname = '$userid'

--插入userbuyorsell,主要我们现在知道了价格是否上涨,通过数据库中的储存nowprice与现在某公司price的差价,
--就会知道我们是否赢利.

insert into userbuyorsell values('$userid','$symbolname','buy',$num,'$price','$time')

select money from users where uname='$userid'

update users set money='$money' where uname='$userid'

--5testfsell.php中的SQL与fbuy.php中的原理差不多
--当出售是我们才知道,我们是否盈利.
SELECT sum(num) FROM userbuyorsell where symbol='$sellsymbol';

"SELECT nowprice FROM userbuyorsell where symbol='$sellsymbol';

SELECT money FROM users where uname='$userid';

update users set money='$newmoney' where uname='$userid'

SELECT cash FROM useraccount where uname='$userid'

update useraccount set cash='$newcash' where uname='$userid'

"insert into userbuyorsell values('$userid','$sellsymbol','sell',$sellnum,'$price','$time')"