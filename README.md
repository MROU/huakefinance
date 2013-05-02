开始这个项目的原因很简单，正在学习cs75。我实现的是huake  Finance。

这个项目开始实现是像project0，并没有分配文件夹，现在分配成文件夹，果然清楚多了。但是我并没有解决的问题是没有控制访问
各个文件夹的权限。
huake  Finance，包含的文件login.html,login.php,register.html,register.php,layout.php这些文件都包含在文件夹loginORregister
中，用户必须先注册才能登陆，同时只有登陆了才能进入主界面。

images中包含了图片资源，common中包含共有文件，huakefinance包含了一些处理文件fbuy.php,testfsell.php,finance.php...。

数据库的名字为login，有三个表users，useraccount，userbuyorsell。
users中包含了uname，upass，email，money，money（表示此用户有的价值等于cash加上stock的价格）
useraccount中包含uname，cash（现在拥有的现金）
userbuyorsell包含uname，symbol（公司的名称），buyorsell（记录用户Buy OR sell），num，nowprice，time
nowprice主要是买进的价格，当我们在买同一个公司的股票时，价格有可能变化，这是我们必须要比较前后两次的差价，来决定我们是否
盈利。
这数据库中有一个值得关注的是我把nowprice设置成了int，所以每次买进的价格后面的小数点就被去除了，这样导致很大的误差。
在设计数据库时，我们应该注意，userbuyorsell不能有主键，因为我们是用它来记录历史记录的，如果我们设置了主键，那们同一个
用户的历史记录就不能被保存了。因为主键只有不允许有重复记录出现。
对于数据库设计要很好的控制它的各个属性的设置。

fgetcsv4.php是从yahoo获得csv，Stock文件。获得某个公司的price，finance.php是这里的主界面，其中有个就是从服务器获取
内容在finance.php上显示，用到了AJAX技术。fcvalue.php是获得历史记录

fbuy.php中要注意的一个逻辑就是，我买了以后money应该不会变，cash会变，testfsell.php卖出以后money要看stock的price是否
上涨了，如果上涨了那么money绝对会变大，我们把买进的价格放到userbuyorsell表中。

如买了FB公司10 stock，price：27.43，cash：10000-274.3，money：10000
在卖出 FB 10 stock，price：25，cash：10000-274.3+250，money：增大。






