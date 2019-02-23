## 1. 项目目录设计
- public：公共资源目录（网站访问根目录），包括入口文件，静态资源
- app：应用目录，存放MVC代码
    + admin：后台代码
        * controller：业务控制器，处理网络请求，带admin\controller命名空间
        * moder：业务模型，处理数据，带admin\model命名空间
        * view：视图模板
    + home：前台代码
        * controller：业务控制器，带home\controller命名空间
        * moder：业务模型，带home\model命名空间
        * view：视图模板
 - config：配置目录，存放配置文件
 - core：核心目录，存放核心文件，如初始化文件，公共控制器，公共模型，带core命名空间
 - vendor：第三方应用/插件目录，如smarty
 
 ***
 
 ## 2. 项目环境部署
 > 说明：以下操作基于windows操作系统
 ### 2.1 安装apache2.4+php7.2+mysql5.6环境
 独立安装各个软件或安装集成软件（如：wamp、phpstudy）都可以
 ### 2.2 配置项目虚拟主机
1. 开启apache虚拟主机功能
    - 去掉apache配置文件**apache安装目录/conf/httpd.conf**中```Include conf/extra/httpd-vhosts.conf```这句的注释
2. 添加虚拟主机配置信息
    - 虚拟主机配置文件**apache安装目录/conf/extra/httpd-vhosts.conf**里添加以下信息
    ```txt
    <VirtualHost *:80>
        DocumentRoot "项目位置绝对路径/public"
        ServerName www.custommvc.com
        <Directory "项目位置绝对路径/public">
            Require all granted
            DirectoryIndex index.php index.html
        </Directory>
    </VirtualHost>
    ```
    > **注意**：如果是初次使用虚拟主机功能且不熟悉其配置，建议先将虚拟主机配置文件里的所有内容注释掉在添加内容
3. 修改本地hosts文件
    - 在本机**C:/Windows/System32/drivers/etc/hosts**文件新增一行```127.0.0.1 www.custommvc.com```并保存（管理员权限打开）
4. 重启apache，访问www.custommvc.com

***

           
    
  
