# ThinkPHPTodoList

thinkphp_5.0.24_with_extend

mac环境下配置
```
# 查看nginx配置文件所在
$ brew info nginx

# 配置文件
cd /usr/local/etc/nginx/conf.d
vim php_site.conf

# 重启nginx
brew services restart nginx

```
建表
```
CREATE TABLE `todo_list`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NULL DEFAULT '',
  `create_time` int(11) NULL,
  `update_time` int(11) NULL,
  `delete_time` int(11) NULL,
  PRIMARY KEY (`id`)
);
```