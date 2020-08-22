**version**：版本，当前版本定义为“3”即可，在文件docker-compose.yml的第一行必须指定

**networks**：定义网络连接，如果是在services下的networks则是指定容器的网络连接配置

**services**：各容器服务

**container_name**：指定容器名称

**image**：指定镜像，如果镜像在本地不存在，Compose 将会尝试拉取这个镜像

**build**：指定构建自定义镜像位置，对应的是docerfile文件。本文的PHP镜像采用的是自定义hwphp镜像

**ports**：暴露端口信息，使用宿主端口：容器端口 (HOST:CONTAINER) 格式

**volumes**：数据卷映射，数据卷所挂载路径设置，格式为宿主机路径:容器路径

**restart**：自动重启容器，容器挂掉之后自动重启机制

**depends_on**：指定容器启动顺序的依赖关系，此选项在 v3 版本中 使用 swarm 部署时将忽略该选项

**environment**：设置环境变量， environment 的值可以覆盖 env_file 的值 (等同于 docker run -e 的作用



**查看日志**
 docker logs --tail 50 --follow --timestamps dockerlnmpswoole_swoole_1
 
 $ docker-compose up                         # 创建并且启动所有容器
$ docker-compose up -d                      # 创建并且后台运行方式启动所有容器
$ docker-compose up nginx php mysql         # 创建并且启动nginx、php、mysql的多个容器
$ docker-compose up -d nginx php  mysql     # 创建并且已后台运行的方式启动nginx、php、mysql容器


$ docker-compose start php                  # 启动服务
$ docker-compose stop php                   # 停止服务
$ docker-compose restart php                # 重启服务
$ docker-compose build php                  # 构建或者重新构建服务

$ docker-compose rm php                     # 删除并且停止php容器
$ docker-compose down                       # 停止并删除容器，网络，图像和挂载卷

**执行容器内命令** ：sudo docker exec -it $DOCKER_ID /bin/bash -c 'cd /packages/detectron && python tools/train.py'
