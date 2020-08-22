实现 docker php + nginx 多版本快速切换

通过shell脚本快速添加切换 （还没做）

**一键启动**
```
docker-compose up -d                 # 创建并且后台运行方式启动所有容器
docker-compose up nginx php56        # 创建并且启动nginx、php、mysql的多个容器
docker-compose up -d nginx php56     # 创建并且已后台运行的方式启动nginx、php、mysql容器

docker-compose start php                  # 启动服务
docker-compose stop php                   # 停止服务
docker-compose restart php                # 重启服务
docker-compose build php                  # 构建或者重新构建服务
```

**查看日志**
```
docker logs --tail 50 --follow --timestamps dockerlnmpswoole_swoole_1
``` 

**执行容器内命令**
```
sudo docker exec -it $DOCKER_ID /bin/bash -c 'COMMAND'
```